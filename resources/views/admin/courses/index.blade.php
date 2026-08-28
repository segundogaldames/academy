@extends('adminlte::page')

@section('title', 'Dashboard Admin')

@section('content_header')
    <h1>Cursos Por Aprobar</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success"> {{ session('info') }} </div>
    @endif
    <div class="card">
        <div class="card-header">
            <h1>Lista de cursos por aprobar</h1>
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th class="col-2">Id</th>
                        <th class="col-4">Título</th>
                        <th class="col-4">Categoría</th>
                        <th class="col-2"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($courses as $course)
                        <tr>
                            <td> {{ $course->id }} </td>
                            <td> {{ $course->title }} </td>
                            <td> {{ $course->category->name }} </td>
                            <td>
                                <a href="{{ route('admin.courses.show', $course) }}" class="btn btn-secondary">
                                    <i class="fas fa-pencil"></i>Revisar</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-info">No hay cursos registrados</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{ $courses->links('vendor.pagination.bootstrap-4') }}
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
