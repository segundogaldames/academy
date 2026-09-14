@extends('adminlte::page')

@section('title', 'Precios')

@section('content_header')
    <h1>Editar Precio</h1>
@stop

@section('content')
    @include('partials.messages')
    <div class="card col-md-6 offset-md-3">
        <div class="card-body">
            <form action="{{ route('admin.prices.update', $price) }}" method="POST">
                @csrf
                @method('PUT')
                @include('admin.prices.partials.form')
                <button type="submit" class="btn btn-secondary">Guardar</button>
                <a href="{{ route('admin.prices.index') }}" class="btn btn-primary">Volver</a>
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
