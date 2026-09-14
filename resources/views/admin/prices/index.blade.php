@extends('adminlte::page')

@section('title', 'Precios')

@section('content_header')
    <h1>Precios</h1>
@stop

@section('content')
    @include('partials.messages')
    <div class="card">
        <div class="card-header">
            <h1>Lista de Precios <a href="{{ route('admin.prices.create') }}" class="btn btn-outline-secondary">Nuevo
                    Precio</a></h1>
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th class="col-2">Id</th>
                        <th class="col-4">Nombre</th>
                        <th class="col-4">Precio</th>
                        <th class="col-2"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($prices as $price)
                        <tr>
                            <td> {{ $price->id }} </td>
                            <td> {{ $price->name }} </td>
                            <td> ${{ number_format($price->price, 0) }} </td>
                            <td>
                                <a href="{{ route('admin.prices.edit', $price) }}" class="btn btn-secondary">
                                    <i class="fas fa-pencil"></i>Editar</a>
                                <form action="{{ route('admin.prices.destroy', $price) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fas fa-trash"></i>Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-info">No hay precios registrados</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{ $prices->links('vendor.pagination.bootstrap-4') }}
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
