@props(['course'])
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">

    <!-- Styles -->
    @livewireStyles
</head>

<body class="font-sans antialiased">
    <x-banner />

    <div class="min-h-screen bg-gray-100">
        @livewire('navigation-menu')


        <!-- Page Content -->
        <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 grid grid-cols-5 gap-2">
            <aside>
                <h1 class="font-bold text-lg mb-4 border-b-2 border-gray-500">Edición del Curso</h1>
                <ul class="text-sm text-gray-600">
                    <li
                        class="leading-7 mb-1 border-l-4 {{ request()->routeIs('instructor.courses.edit') ? 'border-indigo-400' : 'border-transparent' }} pl-2">
                        <a href="{{ route('instructor.courses.edit', $course) }}">Detalle</a>
                    </li>
                    <li
                        class="leading-7 mb-1 border-l-4 {{ request()->routeIs('instructor.courses.curriculum') ? 'border-indigo-400' : 'border-transparent' }} pl-2">
                        <a href="{{ route('instructor.courses.curriculum', $course) }}">Lecciones</a>
                    </li>
                    <li
                        class="leading-7 mb-1 border-l-4 {{ request()->routeIs('instructor.courses.goals') ? 'border-indigo-400' : 'border-transparent' }} pl-2">
                        <a href="{{ route('instructor.courses.goals', $course) }}">Metas</a>
                    </li>
                    <li
                        class="leading-7 mb-1 border-l-4 {{ request()->routeIs('instructor.courses.students') ? 'border-indigo-400' : 'border-transparent' }} pl-2">
                        <a href="{{ route('instructor.courses.students', $course) }}">Estudiantes</a>
                    </li>
                    @if ($course->observation)
                        <li
                            class="leading-7 mb-1 border-l-4 {{ request()->routeIs('instructor.courses.observations') ? 'border-indigo-400' : 'border-transparent' }} pl-2">
                            <a href="{{ route('instructor.courses.observations', $course) }}">Observaciones</a>
                        </li>
                    @endif
                </ul>
                @switch($course->status)
                    @case(1)
                        <form action="{{ route('instructor.courses.status', $course) }}" method="post">
                            @csrf
                            <button type="submit"
                                class="inline-flex items-center justify-center border align-middle select-none font-sans font-medium text-center duration-300 ease-in disabled:opacity-50 disabled:shadow-none disabled:cursor-not-allowed focus:shadow-none text-sm py-2 px-4 shadow-sm hover:shadow-md bg-orange-500 hover:bg-info-light relative bg-gradient-to-b from-orange-500 to-orange-600 border-orange-600 text-stone-50 rounded-lg hover:bg-gradient-to-b hover:from-orange-600 hover:to-orange-600 hover:border-orange-600 after:absolute after:inset-0 after:rounded-[inherit] after:box-shadow after:shadow-[inset_0_1px_0px_rgba(255,255,255,0.35),inset_0_-2px_0px_rgba(0,0,0,0.18)] after:pointer-events-none transition antialiased">Solicitar
                                Revisión</button>
                        </form>
                    @break

                    @case(2)
                        <div class="bg-white shadow-lg rounded overflow-hidden text-blue-500">
                            <div class="px-6 py-4">
                                Este curso se encuentra en revision

                            </div>
                        </div>
                    @break

                    @case(3)
                        <div class="bg-white shadow-lg rounded overflow-hidden text-green-500">
                            <div class="px-6 py-4">
                                Este curso se encuentra publicado

                            </div>
                        </div>
                    @break

                    @default
                @endswitch
            </aside>
            <div class="col-span-4 bg-white shadow-lg rounded overflow-hidden">
                <div class="px-6 py-4 text-gray-600">
                    {{ $slot }}
                </div>
            </div>
        </main>
    </div>

    @stack('modals')

    @livewireScripts

    @isset($js)
        {{ $js }}
    @endisset
</body>

</html>
