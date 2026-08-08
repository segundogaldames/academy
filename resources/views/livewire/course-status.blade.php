<div class="mt-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-3 gap-8">
        <div class="md:col-span-2">
            <div
                class="relative w-full overflow-hidden aspect-video bg-black [&>iframe]:absolute [&>iframe]:top-0 [&>iframe]:left-0 [&>iframe]:w-full [&>iframe]:h-full mb-6">
                {!! $current->iframe !!}

            </div>
            <h1 class="text-gray-700 font-bold text-3xl mb-4"> {{ $current->name }} </h1>
            @if ($current->description)
                <div class="text-gray-600">
                    {{ $current->description->description }}
                </div>
            @endif

            <div class="flex items-center mt-6 cursor-pointer" wire:click="completed">
                @if ($current->completed)
                    <i class="fas fa-toggle-on text-2xl text-blue-600"></i>
                @else
                    <i class="fas fa-toggle-off text-2xl text-gray-600"></i>
                @endif
                <p class="text-sm ml-2">Marcar esta lección como terminada</p>
            </div>

            <div class="bg-white shadow-lg rounded overflow-hidden mt-2">
                <div class="px-6 py-4 flex text-gray-500 font-bold">
                    @if ($this->previous)
                        <a wire:click="changeLesson({{ $this->previous }})" class="cursor-pointer">Tema Anterior</a>
                    @endif
                    @if ($this->next)
                        <a wire:click="changeLesson({{ $this->next }})" class="ml-auto cursor-pointer">Siguiente
                            Tema</a>
                    @endif
                </div>

            </div>

        </div>
        <div class="bg-white shadow-lg rounded overflow-hidden">
            <div class="px-6 py-4">
                <h1 class="text-2xl leading-8 text-center mb-4">{{ $course->title }}</h1>
                <div class="flex items-center">
                    <figure>
                        <img class="h-12 w-12 object-cover rounded-full mr-4 shadow-lg"
                            src="{{ $course->teacher->profile_photo_url }}" alt="">
                    </figure>
                    <div>
                        <p> {{ $course->teacher->name }} </p>
                        <a class="text-blue-500 text-sm" href="">
                            {{ '@' . Str::slug($course->teacher->name, '') }} </a>
                    </div>
                </div>

                <p class="text-gray-500 text-sm mt-2">{{ $this->advance . '%' }} Completado...</p>
                <div class="mb-4">
                    <div class="w-full bg-blue-200 block rounded-full overflow-hidden h-3">
                        <div class="h-full rounded-none bg-blue-500 transition-all duration-500"
                            style="width:{{ $this->advance . '%' }}"></div>
                    </div>

                </div>

                <ul>
                    @foreach ($course->sections as $section)
                        <li class="text-gray-600 mb-4">
                            <a class="font-bold text-base inline-block mb-2" href=""> {{ $section->name }} </a>
                            <ul>
                                @foreach ($section->lessons as $lesson)
                                    <li class="flex">
                                        <div>
                                            @if ($lesson->completed)
                                                @if ($current->id == $lesson->id)
                                                    <span
                                                        class="inline-block w-4 h-4 border-2 border-yellow-500 rounded-full mr-2 mt-1.5"></span>
                                                @else
                                                    <span
                                                        class="inline-block w-4 h-4 bg-yellow-300 rounded-full mr-2 mt-1.5"></span>
                                                @endif
                                            @else
                                                @if ($current->id == $lesson->id)
                                                    <span
                                                        class="inline-block w-4 h-4 border-2 border-gray-500 rounded-full mr-2 mt-1.5"></span>
                                                @else
                                                    <span
                                                        class="inline-block w-4 h-4 bg-gray-300 rounded-full mr-2 mt-1.5"></span>
                                                @endif
                                            @endif
                                        </div>
                                        <a class="cursor-pointer" wire:click="changeLesson({{ $lesson }})">
                                            {{ $lesson->name }}

                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
