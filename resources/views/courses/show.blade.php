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
        <div class="order-2 md:col-span-2 md:order-1">
            <section class="bg-white shadow-lg rounded overflow-hidden mb-12">
                <div class="px-6 py-4">
                    <h1 class="font-bold text-2xl">Lo que aprenderás</h1>
                    <ul class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-2">
                        @foreach ($course->goals as $goal)
                            <li class="text-gray-700 text-base"><i class="fas fa-check text-gray-600 mr-2"></i>
                                {{ $goal->name }} </li>
                        @endforeach
                    </ul>
                </div>
            </section>
            <section class="mb-12">
                <h1 class="font-bold text-3xl">Temario</h1>
                @foreach ($course->sections as $section)
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
                @endforeach
            </section>
            <section class="mb-8">
                <h1 class="font-bold text-3xl">Requisitos</h1>
                <ul class="list-disc list-inside">
                    @foreach ($course->requirements as $requirement)
                        <li class="text-gray-700 text-base"> {{ $requirement->name }} </li>
                    @endforeach
                </ul>
            </section>
            <section>
                <h1 class="font-bold text-3xl">Descripción</h1>
                <div class="text-gray-700 text-base">
                    {!! $course->description !!}
                </div>
            </section>
            @livewire('courses-reviews', ['course' => $course])
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
                    @can('enrolled', $course)
                        <a href="{{ route('courses.status', $course) }}"
                            class="w-full mt-4 inline-flex items-center justify-center rounded-md border border-red-600 bg-red-600 px-6 py-3 text-md font-semibold text-white shadow-sm transition-colors hover:bg-red-700 focus-visible:ring-4 focus-visible:ring-red-200 focus-visible:outline-none">Continuar
                            Curso</a>
                    @else
                        <form action="{{ route('courses.enrolled', $course) }}" method="post">
                            @csrf
                            <button type="submit"
                                class="w-full mt-4 inline-flex items-center justify-center rounded-md border border-red-600 bg-red-600 px-6 py-3 text-md font-semibold text-white shadow-sm transition-colors hover:bg-red-700 focus-visible:ring-4 focus-visible:ring-red-200 focus-visible:outline-none">Llevar
                                este curso</button>
                        </form>
                    @endcan
                </div>
            </section>
            <aside class="hidden md:block">
                @foreach ($similares as $similar)
                    <article class="flex mb-6">
                        <img class="h-32 w-40 object-cover"
                            src="{{ $similar->image?->url && Storage::disk('public')->exists($similar->image->url)
                                ? Storage::url($similar->image->url)
                                : asset('img/home/curso1.jpg') }}"
                            alt="{{ $similar->title ?? 'Curso sin img' }}">
                        <div class="ml-3">
                            <h1>
                                <a class="font-bold text-gray-500 mb-3" href="{{ route('courses.show', $similar) }}">
                                    {{ Str::limit($similar->title, 40) }} </a>
                            </h1>
                            <div class="flex items-center mb-2">
                                <img class="h-8 w-8 object-cover rounded-full shadow-lg"
                                    src="{{ $similar->teacher->profile_photo_url }}" alt="">
                                <p class="text-gray-700 text-sm ml-2"> {{ $similar->teacher->name }} </p>
                            </div>
                            <p class="text-sm"><i class="fas fa-star mr-2 text-yellow-400"></i> {{ $similar->rating }}
                            </p>
                        </div>
                    </article>
                @endforeach
            </aside>
        </div>
    </div>
</x-app-layout>
