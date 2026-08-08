@extends('adminlte::page')

@section('title', 'My Academy')

@section('content_header')
    <h1>Editar Rol</h1>
@stop

@section('content')
    @if (session('success'))
        <div class="alert alert-success" role="alert">
            <strong>Excelente!</strong> {{ session('success') }}
        </div>
    @endif
    <div class="card col-md-6 offset-md-3">
        <div class="card-body">
            <form action="{{ route('admin.roles.update', $role) }}" method="POST">
                @csrf
                @method('PUT')
                @include('admin.roles.partials.form')
                <button type="submit" class="btn btn-secondary">Editar</button>
                <a href="{{ route('admin.roles.index') }}" class="btn btn-primary">Volver</a>
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
