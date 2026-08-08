@props(['course'])

<article class="bg-white shadow-lg rounded overflow-hidden">
    <img class="h-36 w-full object-cover"
        src="{{ $course->image?->url && Storage::disk('public')->exists($course->image->url)
            ? Storage::url($course->image->url)
            : asset('img/home/curso1.jpg') }}"
        alt="{{ $course->title ?? 'Curso sin img' }}">
    <div class="px-6 py-4">
        <h1 class="text-xl text-gray-700 mb-2 leading-6"> {{ Str::limit($course->title, 40) }} </h1>
        <p class="text-gray-500 text-sm mb-2">Prof: {{ $course->teacher->name }} </p>
        <div class="flex">
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
            <p class="text-sm text-gray-500 ml-auto">
                <i class="fas fa-user"></i>
                ({{ $course->students_count }})
            </p>
        </div>
        <a class="w-full mt-4 inline-flex items-center justify-center rounded-md border border-indigo-600 bg-indigo-600 px-6 py-3 text-md font-semibold text-white shadow-sm transition-colors hover:bg-indigo-700 focus-visible:ring-4 focus-visible:ring-indigo-200 focus-visible:outline-none"
            href="{{ route('courses.show', $course) }}">
            Más Información
        </a>
    </div>
</article>
