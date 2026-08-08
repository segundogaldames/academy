@extends('adminlte::page')

@section('title', 'Dashboard Admin')

@section('content_header')
    <h1>Panel de Administración</h1>
@stop

@section('content')
    <p>Bienvenido al panel principal de administración.</p>
@stop

@section('css')
    {{-- CSS adicional personalizado --}}
@stop

@section('js')
    <script>
        console.log("Cargado AdminLTE");
    </script>
@stop
