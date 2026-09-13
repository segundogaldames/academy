@extends('adminlte::page')

@section('title', 'Categorías')

@section('content_header')
    <h1>Editar Categoría</h1>
@stop

@section('content')
    @include('partials.messages')
    <div class="card col-md-6 offset-md-3">
        <div class="card-body">
            <form action="{{ route('admin.categories.update', $category) }}" method="POST">
                @csrf
                @method('PUT')
                @include('admin.categories.partials.form')
                <button type="submit" class="btn btn-secondary">Guardar</button>
                <a href="{{ route('admin.categories.index') }}" class="btn btn-primary">Volver</a>
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
