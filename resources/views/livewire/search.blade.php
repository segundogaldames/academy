<form class="relative" autocomplete="off">
    <div class="flex rounded-md shadow-sm">
        <!-- Input con esquina derecha recta (rounded-r-none) -->
        <input wire:model.live="search" type="text" id="Search" placeholder="Buscar..."
            class="w-full rounded-l-md border border-r-0 border-gray-300 px-3 py-2 text-sm text-gray-900 focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500" />

        <!-- Botón con esquina izquierda recta (rounded-l-none) -->
        <button type="button"
            class="inline-flex items-center rounded-r-md border border-indigo-600 bg-indigo-600 px-4 text-sm font-semibold text-white transition-colors hover:bg-indigo-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
            Buscar
        </button>
    </div>
    @if ($search)
        <ul class="absolute z-50 left-0 w-full bg-white mt-1 rounded-lg overflow-hidden">
            @forelse ($this->results as $result)
                <li class="leading-10 px-5 text-sm cursor-pointer hover:bg-gray-300"><a
                        href="{{ route('courses.show', $result) }}">{{ $result->title }}</a></li>
            @empty
                <li class="leading-10 px-5 text-sm cursor-pointer hover:bg-gray-300">
                    No hay coincidencias
                </li>
            @endforelse

        </ul>

    @endif
</form>
