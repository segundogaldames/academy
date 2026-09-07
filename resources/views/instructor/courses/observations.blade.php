<x-instructor-layout :course="$course">
    <h1 class="uppercase font-bold text-2xl border-b-2 pb-2 border-gray-400">Observaciones</h1>
    <div class="text-gray-700 text-base mt-4">
        {!! $course->observation->body !!}
    </div>
</x-instructor-layout>
