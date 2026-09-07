@extends('adminlte::page')

@section('title', 'Dashboard Admin')

@section('content_header')
    <h1>Observaciones del curso: {{ $course->title }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.courses.reject', $course) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="body">Observación</label>
                    <textarea name="body" id="body" rows="5" class="form-control @error('body') is-invalid @enderror">{{ old('body') }}</textarea>
                    @error('body')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary mt-2">Enviar Observación</button>

        </div>
    </div>
@stop

@section('css')
    {{-- CSS adicional personalizado --}}
    <link rel="stylesheet" href="{{ asset('css/instructor/courses/form.css') }}">
@stop

@section('js')
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const descriptionElement = document.querySelector('#body');

            if (descriptionElement) {
                ClassicEditor
                    .create(descriptionElement, {
                        // Personalización de la barra de herramientas
                        toolbar: [
                            'heading',
                            '|',
                            'bold',
                            'italic',
                            'link',
                            'blockQuote',
                            'link', 'bulletedList', 'numberedList',

                        ]
                        // Al omitir 'link', 'uploadImage', 'insertTable' o 'mediaEmbed', se excluyen de la interfaz.
                    })
                    .then(editor => {
                        console.log('CKEditor 5 personalizado correctamente');
                    })
                    .catch(error => {
                        console.error('Error al inicializar CKEditor:', error);
                    });
            }
        });
    </script>
@stop
