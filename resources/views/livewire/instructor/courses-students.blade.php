<div>
    <x-slot name="course">
        {{ $course->slug }}
    </x-slot>
    @if (session('success'))
        <div role="alert"
            class="relative flex items-start w-full border rounded-md p-2 mb-6 bg-green-500 border-green-500 text-green-50">
            <div class="w-full text-sm font-sans leading-none m-1.5"> {{ session('success') }} </div>
        </div>
    @endif
    <h1 class="font-bold text-xl border-b-2 pb-2 border-gray-400 uppercase">Estudiantes del Curso</h1>
    @if ($students->count())
        <x-table-responsive>
            <table class="w-full">
                <thead
                    class="border-b border-stone-200 bg-stone-100 text-sm font-medium text-stone-600 dark:bg-surface-dark">
                    <tr>
                        <th class="px-2.5 py-2 text-start font-medium">Estudiante</th>
                        <th class="px-2.5 py-2 text-start font-medium">Email</th>
                        <th class="px-2.5 py-2 text-start font-medium"></th>
                    </tr>
                </thead>
                <tbody class="group text-sm text-stone-800 dark:text-white">
                    @foreach ($students as $student)
                        <tr class="border-b border-stone-200 last:border-0">
                            <td class="p-3">
                                <div class="flex items-center gap-3">
                                    <img class="inline-block object-cover object-center w-12 h-12 rounded-full"
                                        src="{{ $student->profile_photo_url }}" alt="">
                                    <div class="flex flex-col">
                                        <small class="font-sans antialiased text-sm text-current">
                                            {{ $student->name }}
                                        </small>
                                    </div>
                                </div>
                            </td>
                            <td class="p-3">
                                <div class="flex flex-col">
                                    <small class="font-sans antialiased text-sm text-current">
                                        {{ $student->email }}
                                    </small>
                                </div>
                            </td>

                            <td class="p-3">
                                <a href=""
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
            {{ $students->links() }}
        </div>
    @else
        <p class="text-blue-700 text-md mt-6 ml-6">No hay estudiantes matriculados</p>
    @endif
</div>
