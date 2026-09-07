<x-app-layout>
    <section class="bg-gray-700 py-12 mb-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-2 gap-6">
            <figure>
                <img class="h-60 w-full object-cover"
                    src="{{ $course->image?->url && Storage::disk('public')->exists($course->image->url)
                        ? Storage::url($course->image->url)
                        : asset('img/home/curso1.jpg') }}"
                    alt="{{ $course->title ?? 'Curso sin img' }}">
            </figure>
            <div class="text-white">
                <h1 class="text-4xl"> {{ $course->title }} </h1>
                <h2 class="text-xl mb-3"> {{ $course->subtitle }} </h2>
                <p class="mb-2"><i class="fas fa-chart-line mr-2"></i>Nivel: {{ $course->level->name }} </p>
                <p class="mb-2"><i class="fas fa-solid fa-layer-group mr-2"></i>Categoría:
                    {{ $course->category->name }} </p>
                <p class="mb-2"><i class="fas fa-users mr-2"></i>Matriculados: {{ $course->students_count }} </p>
                <p><i class="far fa-star mr-2"></i>Calificación: {{ $course->rating }} </p>
            </div>
        </div>
    </section>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-3 gap-6">
        @if (session('warning'))
            <div class="lg:col-span-3" x-data="{ open: true }" x-show="open">
                <div class="relative py-3 pl-4 pr-10 leading-normal text-red-700 bg-red-100 rounded-lg" role="alert">
                    <p> Error!! {{ session('warning') }} </p>
                    <span class="absolute inset-y-0 right-0 flex items-center mr-4" @click="open = false">
                        <svg class="w-4 h-4 fill-current" role="button" viewBox="0 0 20 20">
                            <path
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd" fill-rule="evenodd"></path>
                        </svg>
                    </span>
                </div>
            </div>
        @endif

        <div class="order-2 md:col-span-2 md:order-1">
            <section class="bg-white shadow-lg rounded overflow-hidden mb-12">
                <div class="px-6 py-4">
                    <h1 class="font-bold text-2xl">Lo que aprenderás</h1>
                    <ul class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-2">
                        @forelse ($course->goals as $goal)
                            <li class="text-gray-700 text-base"><i class="fas fa-check text-gray-600 mr-2"></i>
                                {{ $goal->name }} </li>

                        @empty
                            <li class="text-gray-700 text-base">No se han registrado metas para este curso </li>
                        @endforelse

                    </ul>
                </div>
            </section>
            <section class="mb-12">
                <h1 class="font-bold text-3xl">Temario</h1>
                @forelse ($course->sections as $section)
                    <article class="mb-4 shadow"
                        @if ($loop->first) x-data="{ open: true }"
                    @else x-data="{ open: false }" @endif>
                        <header class="border border-gray-200 px-4 py-2 cursor-pointer bg-gray-200"
                            @click="open = !open">
                            <h1 class="font-bold text-lg text-gray-600"> {{ $section->name }} </h1>
                        </header>
                        <div class="bg-white py-2 px-4" x-show="open">
                            <ul class="grid grid-cols-1 gap-2">
                                @foreach ($section->lessons as $lesson)
                                    <li class="text-base text-gray-700"><i
                                            class="fas fa-play-circle text-gray-600 mr-2"></i> {{ $lesson->name }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </article>
                @empty
                    <article class="bg-white shadow-lg rounded overflow-hidden">
                        <div class="px-6 py-4 text-gray-700">No hay secciones registradas en este curso</div>
                    </article>
                @endforelse
            </section>
            <section class="mb-8">
                <h1 class="font-bold text-3xl">Requisitos</h1>
                <ul class="list-disc list-inside">
                    @forelse ($course->requirements as $requirement)
                        <li class="text-gray-700 text-base"> {{ $requirement->name }} </li>
                    @empty
                        <li class="text-gray-700 text-base"> No hay requisitos registrados para este curso</li>
                    @endforelse
                </ul>
            </section>
            <section>
                <h1 class="font-bold text-3xl">Descripción</h1>
                <div class="text-gray-700 text-base">
                    {!! $course->description !!}
                </div>
            </section>
        </div>
        <div class="order 1 md:order-2">
            <section class="bg-white shadow-lg rounded overflow-hidden mb-4">
                <div class="px-6 py-4">
                    <div class="flex items-center">
                        <img class="h-12 w-12 object-cover shadow-lg rounded-full"
                            src="{{ $course->teacher->profile_photo_url }}" alt="{{ $course->teacher->name }}">
                        <div class="ml-4">
                            <h1 class="font-bold text-gray-500 text-lg">Prof. {{ $course->teacher->name }} </h1>
                            <a class="text-blue-400 text-sm font-bold" href="">
                                {{ '@' . Str::slug($course->teacher->name, '') }} </a>
                        </div>
                    </div>
                    <form action="{{ route('admin.courses.approved', $course) }}" method="POST">
                        @csrf
                        <button
                            class="h-10 px-5 m-2 text-blue-100 transition-colors duration-150 bg-blue-600 rounded-lg focus:shadow-outline hover:bg-blue-700 w-full mt-4">Aprobar
                            Curso</button>
                    </form>

                    <a href="{{ route('admin.courses.observation', $course) }}"
                        class="inline-flex items-center justify-center border align-middle select-none font-sans font-medium text-center duration-300 ease-in disabled:opacity-50 disabled:shadow-none disabled:cursor-not-allowed focus:shadow-none text-sm py-2 px-4 shadow-sm hover:shadow-md bg-amber-500 hover:bg-warning-light relative bg-gradient-to-b from-orange-500 to-orange-600 border-orange-600 text-stone-50 rounded-lg hover:bg-gradient-to-b hover:from-orange-600 hover:to-orange-600 hover:border-orange-600 after:absolute after:inset-0 after:rounded-[inherit] after:box-shadow after:shadow-[inset_0_1px_0px_rgba(255,255,255,0.35),inset_0_-2px_0px_rgba(0,0,0,0.18)] after:pointer-events-none transition antialiase w-full ml-2">
                        Realizar Observaciones
                    </a>

                </div>
            </section>

        </div>
    </div>
</x-app-layout>
