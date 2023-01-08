<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class CursoController extends Controller
{

        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['cursos'] = Curso::paginate(2);
        return view('cursos.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cursos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // Validacion
        $campos = [
            'Nombre' => 'required|string|max:20',
            'Inicio'=> 'required|date',
            'Fin' => 'required|date',
            'Precio' => 'required|numeric|min:20',
            'Edicion' => 'required|numeric|min:1',
            'Poster' => 'required|mimes:jpeg,png,jpg,webp,svg',
        ];

        $mensages_de_error = [
            'required' => 'El :attribute es requerido.',
            'max' => 'El valor máximo de caracteres de :attribute es 20.',
            'Poster.mimes' => 'Los formatos aceptados del :attribute son: jpeg, png, jpg, webp o svg.',
            'Precio.min' => 'El precio mínimo del curso es 20 euros.',
            'Edicion.min' => 'La Edición del curso debe ser al menos la 1ra (1).',
        ];

        $this->validate($request, $campos, $mensages_de_error);

        $course = request()->except('_token');
        
        $course['Inicio'] = date('Y-m-d', strtotime($request->input('Inicio')));
        $course['Fin'] = date('Y-m-d', strtotime($request->input('Fin')));

        if($request->hasFile('Poster')){
            $course['Poster'] = $request->file('Poster')->store('cursos/posters', 'public');
        };

        Curso::create($course);
        return redirect('cursos')->with('mensaje', 'Curso agregado satisfactoriamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $curso = Curso::findOrFail($id);
        return view('cursos.show', compact('curso'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $curso = Curso::findOrFail($id);
        return view('cursos.edit', compact('curso'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validacion
        $campos = [
            'Nombre' => 'required|string|max:20',
            'Inicio'=> 'required|date',
            'Fin' => 'required|date',
            'Precio' => 'required|numeric|min:20',
            'Edicion' => 'required|numeric|min:1',
        ];

        $mensages_de_error = [
            'required' => 'El :attribute es requerido.',
            'max' => 'El valor máximo de caracteres de :attribute es 20.',
            'Precio.min' => 'El precio mínimo del curso es 20 euros.',
            'Edicion.min' => 'La Edición del curso debe ser al menos la 1ra (1).',
        ];

        if($request->hasFile('Poster')){
            /*
            array_push($campos, 'Poster' => 'required|mimes:jpeg,png,jpg,webp,svg');
            array_push(
                $mensages_de_error,
                'Poster.mimes' => 'Los formatos aceptados del :attribute son: jpeg, png, jpg, webp o svg.',
                'Poster.required' => 'El :attribute es requerido.'
            );
            */
        };

        $this->validate($request, $campos, $mensages_de_error);

        $course = request()->except(['_token', '_method']);
        
        $course['Inicio'] = date('Y-m-d', strtotime($request->input('Inicio')));
        $course['Fin'] = date('Y-m-d', strtotime($request->input('Fin')));

        if($request->hasFile('Poster')){
            $current_course = Curso::findOrFail($id);
            Storage::delete('public/'.$current_course->Poster);

            $course['Poster'] = $request->file('Poster')->store('cursos/posters', 'public');
        };

        Curso::where('id', '=', $id)->update($course);

        return redirect('cursos')->with('mensaje', 'Curso modificado satisfactoriamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course = Curso::findOrFail($id);
        Storage::delete('public/'.$course->Poster);
        Curso::destroy($id);
        return redirect('cursos')->with('mensaje', 'Curso eliminado satisfactoriamente.');
    }
}
