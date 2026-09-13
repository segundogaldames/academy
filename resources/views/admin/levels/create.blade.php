@extends('adminlte::page')

@section('title', 'Niveles')

@section('content_header')
    <h1>Crear Nivel</h1>
@stop

@section('content')
    <div class="card col-md-6 offset-md-3">
        <div class="card-body">
            <form action="{{ route('admin.levels.store') }}" method="POST">
                @csrf
                @include('admin.levels.partials.form')
                <button type="submit" class="btn btn-secondary">Guardar</button>
                <a href="{{ route('admin.levels.index') }}" class="btn btn-primary">Volver</a>
            </form>

        </div>
    </div>
@stop

@section('css')
    {{-- CSS adicional personalizado --}}
@stop

@section('js')
    <script>
        console.log("Cargado AdminLTE");
    </script>
@stop
