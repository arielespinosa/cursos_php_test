@extends('layouts.app')

@section('content')
<div class="container">
    <div style="align-items: rigth;">
        <a href="{{ url('/cursos/create') }}" class="btn btn-success btn-sm">CREAR CURSO</a>
    </div>
    <div class="row justify-content-center">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col">Código</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Fecha de Inicio</th>
                    <th scope="col">Fecha de Culminación</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Edicion</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($cursos as $curso)
                <tr>
                    <th>
                        <img src="{{ asset('storage').'/'.$curso->Poster }}" class="img-thumbnail" width="70">
                    </th>
                    <td>{{ $curso->id }}</td>
                    <td>{{ $curso->Nombre }}</td>
                    <td>{{ $curso->Inicio }}</td>
                    <td>{{ $curso->Fin }}</td>
                    <td>{{ $curso->Precio }}</td>
                    <td>{{ $curso->Edicion }}</td>
                    <td>
    
                        <a href="{{ url('/cursos/'.$curso->id) }}" class="btn btn-secondary btn-sm">
                            <i class="fa fa-eye"></i>
                        </a>
                        <a href="{{ url('/cursos/'.$curso->id.'/edit') }}" class="btn btn-secondary btn-sm">
                            <i class="fa fa-pen"></i>
                        </a>
                        <form method="post" action="{{ url('/cursos/'.$curso->id) }}" style="display: inline-block; vertical-align: middle;">
                            @csrf
                            {{ method_field('DELETE') }}
                            <button type="submit" class="btn btn-secondary btn-sm">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                      
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        {!! $cursos->links() !!}
        </div>
    </div>
</div>

@endsection
