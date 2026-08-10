<x-app-layout>
    {{-- CSS de CKEditor --}}
    <link rel="stylesheet" href="{{ asset('css/instructor/courses/form.css') }}">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 grid grid-cols-5 gap-2">
        <aside>
            <h1 class="font-bold text-lg mb-4 border-b-2 border-gray-500">Edición del Curso</h1>
            <ul class="text-sm text-gray-600">
                <li class="leading-7 mb-1 border-l-4 border-indigo-400 pl-2"><a href="">Detalle</a></li>
                <li class="leading-7 mb-1 border-l-4 border-transparent pl-2"><a href="">Lecciones</a></li>
                <li class="leading-7 mb-1 border-l-4 border-transparent pl-2"><a href="">Metas</a></li>
                <li class="leading-7 mb-1 border-l-4 border-transparent pl-2"><a href="">Estudiantes</a></li>
            </ul>
        </aside>
        <div class="col-span-4 bg-white shadow-lg rounded overflow-hidden">
            <div class="px-6 py-4 text-gray-600">
                <h1 class="uppercase font-bold text-2xl border-b-2 pb-2 border-gray-400">Detalle del Curso</h1>
                <form action="{{ route('instructor.courses.update', $course) }}" method="post"
                    enctype="multipart/form-data" autocomplete="off">
                    @method('PUT')
                    @include('instructor.courses.partials.form')
                    <div class="flex justify-end">
                        <button
                            class="inline-flex items-center justify-center border align-middle select-none font-sans font-medium text-center duration-300 ease-in disabled:opacity-50 disabled:shadow-none disabled:cursor-not-allowed focus:shadow-none text-md py-2 px-6 shadow-sm hover:shadow-md bg-stone-800 hover:bg-stone-700 relative bg-gradient-to-b from-stone-700 to-stone-800 border-stone-900 text-stone-50 rounded-lg hover:bg-gradient-to-b hover:from-stone-800 hover:to-stone-800 hover:border-stone-900 after:absolute after:inset-0 after:rounded-[inherit] after:box-shadow after:shadow-[inset_0_1px_0px_rgba(255,255,255,0.25),inset_0_-2px_0px_rgba(0,0,0,0.35)] after:pointer-events-none transition antialiased">Modificar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <x-slot name="js">
        <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>

        <script src="{{ asset('js/instructor/courses/form.js') }}"></script>
    </x-slot>
</x-app-layout>
