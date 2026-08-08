<x-app-layout>
    <section class="bg-cover" style="background-image:url({{ asset('img/home/imagen2.jpg') }})">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-36">
            <div class="w-full md_w-3/4 lg:w-1/2">
                <h1 class="text-white fomt-bold text-4xl">Domina la tecnología con Mi Academy</h1>
                <p class="text-white text-lg mt-2 mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Quibusdam
                    commodi
                    earum, sunt atque dolorem
                    reiciendis tempore odit dolores cupiditate similique eveniet aliquam exercitationem consectetur
                    reprehenderit laboriosam inventore asperiores quod at!</p>
                <div class="w-full max-w-md">
                    <label for="Search" class="sr-only">Buscar</label>

                    <!-- Contenedor Flex que une ambos elementos -->
                    @livewire('search')
                </div>
            </div>
        </div>
    </section>

    <section class="mt-24">
        <h1 class="text-gray-600 text-center text-3xl mb-6">CONTENIDO</h1>
        <div
            class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">
            <article>
                <figure>
                    <img class="rounded-xl h-36 w-full object-cover" src="{{ asset('img/home/contenido1.jpg') }}"
                        alt="">
                </figure>
                <header class="mt-2">
                    <h1 class="text-center text-xl text-gray-700">Cursos y Proyectos </h1>
                </header>
                <p class="text-sm text-gray-500">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto
                    ipsa reiciendis, ut doloribus doloremque molestias.</p>
            </article>
            <article>
                <figure>
                    <img class="rounded-xl h-36 w-full object-cover" src="{{ asset('img/home/contenido5.jpg') }}"
                        alt="">
                </figure>
                <header class="mt-2">
                    <h1 class="text-center text-xl text-gray-700">Manual de Laravel </h1>
                </header>
                <p class="text-sm text-gray-500">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto
                    ipsa reiciendis, ut doloribus doloremque molestias.</p>
            </article>
            <article>
                <figure>
                    <img class="rounded-xl h-36 w-full object-cover" src="{{ asset('img/home/contenido3.jpg') }}"
                        alt="">
                </figure>
                <header class="mt-2">
                    <h1 class="text-center text-xl text-gray-700">Blog </h1>
                </header>
                <p class="text-sm text-gray-500">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto
                    ipsa reiciendis, ut doloribus doloremque molestias.</p>
            </article>
            <article>
                <figure>
                    <img class="rounded-xl h-36 w-full object-cover" src="{{ asset('img/home/contenido4.png') }}"
                        alt="">
                </figure>
                <header class="mt-2">
                    <h1 class="text-center text-xl text-gray-700">Fundamentos de PHP </h1>
                </header>
                <p class="text-sm text-gray-500">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto
                    ipsa reiciendis, ut doloribus doloremque molestias.</p>
            </article>
        </div>
    </section>
    <section class="mt-24 bg-gray-700 py-12">
        <h1 class="text-center text-white text-3xl">¿Qué cursos quieres llevar?</h1>
        <p class="text-center text-white">Elige tu curso desde el catálogo de cursos</p>
        <div class="flex justify-center">
            <a class="inline-flex items-center justify-center rounded-md border border-indigo-600 bg-indigo-600 px-6 py-3 text-md font-semibold text-white shadow-sm transition-colors hover:bg-indigo-700 focus-visible:ring-4 focus-visible:ring-indigo-200 focus-visible:outline-none mt-4"
                href="{{ route('courses.index') }}">
                Catálogo de Cursos
            </a>

        </div>
    </section>
    <section class="my-24">
        <h1 class="text-center text-3xl text-gray-600">ÚLTIMOS CURSOS</h1>
        <p class="text-center text-gray-500 text-sm mb-6">Nuevos cursos se aproximan...</p>
        <div
            class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">
            @foreach ($courses as $course)
                <x-course-card :course="$course"></x-course-card>
            @endforeach
        </div>
    </section>
</x-app-layout>
