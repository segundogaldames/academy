@extends('adminlte::page')

@section('title', 'Niveles')

@section('content_header')
    <h1>Niveles</h1>
@stop

@section('content')
    @include('partials.messages')
    <div class="card">
        <div class="card-header">
            <h1>Lista de Niveles <a href="{{ route('admin.levels.create') }}" class="btn btn-outline-secondary">Nuevo
                    Nivel</a></h1>
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th class="col-2">Id</th>
                        <th class="col-8">Nivel</th>
                        <th class="col-2"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($levels as $level)
                        <tr>
                            <td> {{ $level->id }} </td>
                            <td> {{ $level->name }} </td>
                            <td>
                                <a href="{{ route('admin.levels.edit', $level) }}" class="btn btn-secondary">
                                    <i class="fas fa-pencil"></i>Editar</a>
                                <form action="{{ route('admin.levels.destroy', $level) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fas fa-trash"></i>Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-info">No hay niveles registrados</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{ $levels->links('vendor.pagination.bootstrap-4') }}
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
