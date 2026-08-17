<div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

        @if ($courses->count())
            <x-table-responsive>
                <table class="w-full">
                    <thead
                        class="border-b border-stone-200 bg-stone-100 text-sm font-medium text-stone-600 dark:bg-surface-dark">
                        <tr>
                            <th class="px-2.5 py-2 text-start font-medium">Curso</th>
                            <th class="px-2.5 py-2 text-start font-medium">Matriculados</th>
                            <th class="px-2.5 py-2 text-start font-medium">Calificación</th>
                            <th class="px-2.5 py-2 text-start font-medium">Status</th>
                            <th class="px-2.5 py-2 text-start font-medium"></th>
                        </tr>
                    </thead>
                    <tbody class="group text-sm text-stone-800 dark:text-white">
                        @foreach ($courses as $course)
                            <tr class="border-b border-stone-200 last:border-0">
                                <td class="p-3">
                                    <div class="flex items-center gap-3">
                                        <img class="inline-block object-cover object-center w-12 h-12 rounded-full"
                                            src="{{ $course->image?->url && Storage::disk('public')->exists($course->image->url)
                                                ? Storage::url($course->image->url)
                                                : asset('img/home/curso1.jpg') }}"
                                            alt="{{ $course->title ?? 'Curso sin img' }}">
                                        <div class="flex flex-col">
                                            <small class="font-sans antialiased text-sm text-current">
                                                {{ $course->title }}
                                            </small>
                                            <small class="font-sans antialiased text-sm text-current opacity-70">
                                                {{ $course->category->name }}
                                            </small>
                                        </div>
                                    </div>
                                </td>
                                <td class="p-3">
                                    <div class="flex flex-col">
                                        <small class="font-sans antialiased text-sm text-current">
                                            {{ $course->students->count() }}
                                        </small>
                                        <small
                                            class="font-sans antialiased text-sm text-current opacity-70">Estudiantes</small>
                                    </div>
                                </td>
                                <td class="p-3">
                                    <div class="flex flex-col">
                                        <div class="font-sans antialiased text-sm text-current flex gap-1">
                                            {{ $course->rating }}
                                            <ul class="flex text-sm">
                                                <li class="mr-1"><i
                                                        class="fas fa-star {{ $course->rating >= 1 ? 'text-yellow-400' : 'text-gray-400' }}"></i>
                                                </li>
                                                <li class="mr-1"><i
                                                        class="fas fa-star {{ $course->rating >= 2 ? 'text-yellow-400' : 'text-gray-400' }}"></i>
                                                </li>
                                                <li class="mr-1"><i
                                                        class="fas fa-star {{ $course->rating >= 3 ? 'text-yellow-400' : 'text-gray-400' }}"></i>
                                                </li>
                                                <li class="mr-1"><i
                                                        class="fas fa-star {{ $course->rating >= 4 ? 'text-yellow-400' : 'text-gray-400' }}"></i>
                                                </li>
                                                <li class="mr-1"><i
                                                        class="fas fa-star {{ $course->rating == 5 ? 'text-yellow-400' : 'text-gray-400' }}"></i>
                                                </li>
                                            </ul>
                                        </div>
                                        <small
                                            class="font-sans antialiased text-sm text-current opacity-70">Valoraciones</small>
                                    </div>
                                </td>
                                <td class="p-3">
                                    <div class="w-max">
                                        @switch($course->status)
                                            @case(1)
                                                <div
                                                    class="relative inline-flex w-max items-center border font-sans font-medium rounded-md text-xs p-0.5 shadow-sm bg-red-500 border-red-500 text-green-50">
                                                    <span
                                                        class="font-sans text-current leading-none my-0.5 mx-1.5">Borrador</span>
                                                </div>
                                            @break

                                            @case(2)
                                                <div
                                                    class="relative inline-flex w-max items-center border font-sans font-medium rounded-md text-xs p-0.5 shadow-sm bg-yellow-500 border-yellow-500 text-green-50">
                                                    <span
                                                        class="font-sans text-current leading-none my-0.5 mx-1.5">Revisión</span>
                                                </div>
                                            @break

                                            @case(3)
                                                <div
                                                    class="relative inline-flex w-max items-center border font-sans font-medium rounded-md text-xs p-0.5 shadow-sm bg-green-500 border-green-500 text-green-50">
                                                    <span
                                                        class="font-sans text-current leading-none my-0.5 mx-1.5">Publicado</span>
                                                </div>
                                            @break
                                        @endswitch
                                    </div>
                                </td>
                                <td class="p-3">
                                    <a href="{{ route('instructor.courses.edit', $course) }}"
                                        class="inline-grid place-items-center border align-middle select-none font-sans font-medium text-center transition-all duration-300 ease-in disabled:opacity-50 text-sm min-w-[38px] min-h-[38px] rounded-md bg-transparent border-transparent text-stone-800 hover:bg-stone-200/10 hover:border-stone-600/10 shadow-none outline-none group">
                                        <svg width="1.5em" height="1.5em" viewBox="0 0 24 24" stroke-width="1.5"
                                            fill="none" xmlns="http://www.w3.org/2000/svg" color="currentColor"
                                            class="h-4 w-4 text-stone-800 dark:text-white">
                                            <path
                                                d="M14.3632 5.65156L15.8431 4.17157C16.6242 3.39052 17.8905 3.39052 18.6716 4.17157L20.0858 5.58579C20.8668 6.36683 20.8668 7.63316 20.0858 8.41421L18.6058 9.8942M14.3632 5.65156L4.74749 15.2672C4.41542 15.5993 4.21079 16.0376 4.16947 16.5054L3.92738 19.2459C3.87261 19.8659 4.39148 20.3848 5.0115 20.33L7.75191 20.0879C8.21972 20.0466 8.65806 19.8419 8.99013 19.5099L18.6058 9.8942M14.3632 5.65156L18.6058 9.8942"
                                                stroke="currentColor" stroke-linecap="round" stroke-linejoin="round">
                                            </path>
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </x-table-responsive>

            <div class="mt-4">
                {{ $courses->links() }}
            </div>
        @else
            <p class="text-blue-700 text-md mt-6 ml-6">No hay cursos creados</p>
        @endif

    </div>
</div>
