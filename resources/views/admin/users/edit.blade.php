@extends('adminlte::page')

@section('title', 'My Academy')

@section('content_header')
    <h1>Asignar Rol</h1>
@stop

@section('content')
    <div class="card">
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                <strong>Excelente!</strong> {{ session('success') }}
            </div>
        @endif

        <div class="card-body">
            <h1 class="h5">Nombre:</h1>
            <p class="form-control"> {{ $user->name }} </p>
            <h1 class="h5 mb-2">Lista de Roles</h1>
            @error('roles')
                <p class="text-danger">
                    {{ $message }}
                </p>
            @enderror
            <form action="{{ route('admin.users.update', $user) }}" method="post">
                @csrf
                @method('PUT')
                @foreach ($roles as $role)
                    <div>
                        <label for="role">
                            <input type="checkbox" name="roles[]" value="{{ $role->id }}" id=""
                                {{ $user->roles->contains('id', $role->id) ? 'checked' : '' }}>
                            {{ $role->name }}
                        </label>

                    </div>
                @endforeach
                <div class="mt-2">
                    <button type="submit" class="btn btn-secondary">Agregar Rol</button>
                    <a href="{{ route('admin.users.index') }}" class="btn btn-primary">Volver</a>

                </div>
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
