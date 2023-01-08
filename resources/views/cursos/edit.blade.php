@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Editar Curso</div>

                <div class="card-body">
                    <form method="POST" action="{{ url('/cursos/'.$curso->id) }}" enctype='multipart/form-data'>
                        @csrf
                        {{ method_field('PATCH') }}
						@include('cursos.form')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(function() {
        $('#datepicker').datepicker();
    });
</script>
@endsection
