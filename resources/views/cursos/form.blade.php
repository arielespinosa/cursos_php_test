
<div class="row mb-3">
    <label for="Poster" class="col-md-4 col-form-label text-md-end">
        {{ __('Poster') }}
    </label>
    <div class="col-md-6">
        <input id="Poster" type="file" class="form-control @error('Poster') is-invalid @enderror"
            value="{{ isset($curso->Poster)?$curso->Poster:old('Poster') }}"  name="Poster">
        
        @if($curso->Poster)
            <div style='padding-top: 10px;'>
                <img src="{{ asset('storage').'/'.$curso->Poster }}" class="img-thumbnail" width="150">
                <br>
                <strong>Fichero actual: {{ $curso->Poster }}</strong>
            </div>
        
        @endif

        @error('Poster')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="row mb-3">
    <label for="Nombre" class="col-md-4 col-form-label text-md-end">
        {{ __('Nombre') }}
    </label>
    <div class="col-md-6">
        <input id="Nombre" type="text" class="form-control @error('Nombre') is-invalid @enderror" 
            value="{{ isset($curso->Nombre)?$curso->Nombre:old('Nombre') }}" name="Nombre" required autofocus
        >

        @error('Nombre')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="row mb-3">
    <label for="Inicio" class="col-md-4 col-form-label text-md-end">
        {{ __('Fecha de Inicio') }}
    </label>
    <div class="col-md-6">
        <div class="input-group date" data-provide="datepicker">
            <input type="text" class="form-control" name="Inicio" value="{{ isset($curso->Inicio)?$curso->Inicio:old('Inicio') }}">
            <div class="input-group-addon">
                <span class="glyphicon glyphicon-th"></span>
            </div>
        </div>
    </div>
</div>

<div class="row mb-3">
    <label for="Inicio" class="col-md-4 col-form-label text-md-end">
        {{ __('Fecha de Culminación') }}
    </label>
    <div class="col-md-6">
        <div class="input-group date" data-provide="datepicker">
            <input type="text" class="form-control"  name="Fin" value="{{ isset($curso->Fin)?$curso->Fin:old('Fin') }}">
            <div class="input-group-addon">
                <span class="glyphicon glyphicon-th"></span>
            </div>
        </div>
    </div>
</div>

<div class="row mb-3">
    <label for="Precio" class="col-md-4 col-form-label text-md-end">
        {{ __('Precio') }}
    </label>
    <div class="col-md-6">
        <input id="Precio" type="text" class="form-control @error('Precio') is-invalid @enderror" 
            value="{{ isset($curso->Precio)?$curso->Precio:old('Precio') }}" name="Precio" required autofocus
        >

        @error('Precio')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="row mb-3">
    <label for="Edicion" class="col-md-4 col-form-label text-md-end">
        {{ __('Edición') }}
    </label>
    <div class="col-md-6">
        <input id="Edicion" type="text" class="form-control @error('Edicion') is-invalid @enderror" 
            value="{{ isset($curso->Edicion)?$curso->Edicion:old('Edicion') }}" name="Edicion" required autofocus
        >

        @error('Edicion')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="row mb-0">
    <div class="col-md-8 offset-md-4">
        <a href="{{ url('/cursos') }}" class="btn btn-danger">{{ __('CANCELAR') }}</a>
        <button type="submit" class="btn btn-success">{{ __('ACEPTAR') }}</button>
    </div>
</div>

