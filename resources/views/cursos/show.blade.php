@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Detalles del curso {{ $curso->Nombre }}</div>

                <div class="card-body">

                    <div class="row mb-3">
                        <img src="{{ asset('storage').'/'.$curso->Poster }}" class="img-thumbnail" style="max-width: 400px!important; margin-left: 25%;">
                    </div>

                    <div class="row mb-3">
                        <label class="col-md-4 text-md-end">{{ __('Nombre') }}</label>
                        <div class="col-md-6">{{ $curso->Nombre }}</div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-md-4 text-md-end">{{ __('Fecha de Inicio') }}</label>
                        <div class="col-md-6">{{ $curso->Inicio }}</div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-md-4 text-md-end">{{ __('Fecha de Culminación') }}</label>
                        <div class="col-md-6">{{ $curso->Fin }}</div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-md-4 text-md-end">{{ __('Edición') }}</label>
                        <div class="col-md-6">{{ $curso->Edicion }}</div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-md-4 text-md-end">{{ __('Precio') }}</label>
                        <div class="col-md-6">{{ $curso->Precio }}</div>
                    </div>

                    <div class="row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <a href="{{ url('/cursos') }}" class="btn btn-danger">{{ __('ATRAS') }}</a>
                            <a href="{{ url('/cursos/'.$curso->id.'/edit') }}" class="btn btn-warning">{{ __('EDITAR') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
