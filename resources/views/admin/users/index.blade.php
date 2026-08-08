@extends('adminlte::page')

@section('title', 'My Academy')

@section('content_header')
    <h1>Lista de Usuarios</h1>
@stop

@section('content')
    @livewire('admin-users')
@stop

@section('css')
    {{-- CSS adicional personalizado --}}
@stop

@section('js')
    <script>
        console.log("Cargado AdminLTE");
    </script>
@stop
