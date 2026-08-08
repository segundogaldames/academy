@extends('adminlte::page')

@section('title', 'My Academy')

@section('content_header')
    <h1>Lista de Roles</h1>
@stop

@section('content')
    @if (session('success'))
        <div class="alert alert-success" role="alert">
            <strong>Excelente!</strong> {{ session('success') }}
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            <a href="{{ route('admin.roles.create') }}" class="btn btn-outline-secondary">Nuevo Rol</a>
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th class="col-2">Id</th>
                        <th class="col-8">Nombre</th>
                        <th colspan="2" class="col-2"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($roles as $role)
                        <tr>
                            <td> {{ $role->id }} </td>
                            <td> {{ $role->name }} </td>
                            <td>
                                <a href="{{ route('admin.roles.edit', $role) }}" class="btn btn-secondary">Editar</a>
                            </td>
                            <td>
                                <form action="{{ route('admin.roles.destroy', $role) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-info">No hay roles registrados</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
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
