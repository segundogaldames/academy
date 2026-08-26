<x-instructor-layout :course="$course">

    {{-- CSS de CKEditor --}}
    <link rel="stylesheet" href="{{ asset('css/instructor/courses/form.css') }}">

    @if (session('success'))
        <div role="alert"
            class="relative flex items-start w-full border rounded-md p-2 mb-6 bg-green-500 border-green-500 text-green-50">
            <div class="w-full text-sm font-sans leading-none m-1.5"> {{ session('success') }} </div>
        </div>
    @endif
    <h1 class="uppercase font-bold text-2xl border-b-2 pb-2 border-gray-400">Detalle del Curso</h1>
    <form action="{{ route('instructor.courses.update', $course) }}" method="post" enctype="multipart/form-data"
        autocomplete="off">
        @method('PUT')
        @include('instructor.courses.partials.form')
        <div class="flex justify-end">
            <button
                class="inline-flex items-center justify-center border align-middle select-none font-sans font-medium text-center duration-300 ease-in disabled:opacity-50 disabled:shadow-none disabled:cursor-not-allowed focus:shadow-none text-md py-2 px-6 shadow-sm hover:shadow-md bg-stone-800 hover:bg-stone-700 relative bg-gradient-to-b from-stone-700 to-stone-800 border-stone-900 text-stone-50 rounded-lg hover:bg-gradient-to-b hover:from-stone-800 hover:to-stone-800 hover:border-stone-900 after:absolute after:inset-0 after:rounded-[inherit] after:box-shadow after:shadow-[inset_0_1px_0px_rgba(255,255,255,0.25),inset_0_-2px_0px_rgba(0,0,0,0.35)] after:pointer-events-none transition antialiased">Modificar</button>
        </div>
    </form>
    <x-slot name="js">
        <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>

        <script src="{{ asset('js/instructor/courses/form.js') }}"></script>
    </x-slot>
</x-instructor-layout>
