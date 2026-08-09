<x-app-layout>
    <section class="bg-cover" style="background-image:url({{ asset('img/courses/portada_courses.png') }})">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-36">
            <div class="w-full md_w-3/4 lg:w-1/2">
                <h1 class="text-white fomt-bold text-4xl">Los mejores cursos en español están en Mi Academy</h1>
                <p class="text-white text-lg mt-2 mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Quibusdam
                    commodi
                    earum, sunt atque dolorem
                    reiciendis tempore odit dolores cupiditate similique eveniet aliquam exercitationem consectetur
                    reprehenderit laboriosam inventore asperiores quod at!</p>
                @livewire('search')
            </div>
        </div>
    </section>
    @livewire('courses-index')
</x-app-layout>
