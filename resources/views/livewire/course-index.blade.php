<div>
    <!-- 1. BARRA DE FILTROS GRIS -->
    <div class="flex flex-col gap-12">

        <div class="bg-gray-200 py-4 mb-12">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center gap-4">

                <!-- Botón Todos los Cursos -->
                <button class="bg-white shadow h-12 rounded-lg px-4 text-gray-700 text-sm" wire:click="resetFilters">
                    <i class="fas fa-solid fa-archway text-xs mr-2"></i>Todos los Cursos
                </button>

                <!-- Dropdown Categoría -->
                <div x-data="{ open: false }" @click.outside="open = false" class="relative inline-block text-left">
                    <button @click="open = !open" type="button"
                        class="inline-flex h-12 items-center justify-center gap-x-2 rounded-lg bg-white px-4 text-sm font-medium text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:outline-none">
                        <i class="fas fa-tag text-gray-500 text-sm mr-2"></i>
                        <span>Categoría</span>
                        <i class="fas fa-solid fa-angle-down text-sm ml-2"></i>
                    </button>

                    <div x-show="open" x-transition
                        class="absolute left-0 z-50 mt-2 w-56 origin-top-left rounded-lg bg-white p-1 shadow-lg ring-1 ring-black/5"
                        style="display: none;" role="menu">
                        @foreach ($categories as $category)
                            <a class="cursor-pointer group flex items-center gap-x-2 rounded-md px-3 py-2 text-sm text-gray-700 hover:bg-indigo-50 hover:text-indigo-600 transition-colors"
                                wire:click="$set('category_id',{{ $category->id }})" @click="open = false">
                                <i class="fas fa-laptop-code text-gray-400 group-hover:text-indigo-600 w-4"></i>
                                {{ $category->name }}
                            </a>
                        @endforeach
                    </div>
                </div>

                <!-- Dropdown Niveles -->
                <div x-data="{ open: false }" @click.outside="open = false" class="relative inline-block text-left">
                    <button @click="open = !open" type="button"
                        class="inline-flex h-12 items-center justify-center gap-x-2 rounded-lg bg-white px-4 text-sm font-medium text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:outline-none">
                        <i class="fas fa-solid fa-signal text-sm mr-2"></i>
                        <span>Niveles</span>
                        <i class="fas fa-solid fa-angle-down text-sm ml-2"></i>
                    </button>

                    <div x-show="open" x-transition
                        class="absolute left-0 z-50 mt-2 w-56 origin-top-left rounded-lg bg-white p-1 shadow-lg ring-1 ring-black/5"
                        style="display: none;" role="menu">
                        @foreach ($levels as $level)
                            <a class="cursor-pointer group flex items-center gap-x-2 rounded-md px-3 py-2 text-sm text-gray-700 hover:bg-indigo-50 hover:text-indigo-600 transition-colors"
                                wire:click="$set('level_id',{{ $level->id }})" @click="open = false">
                                <i class="fas fa-solid fa-signal text-gray-400 group-hover:text-indigo-600 w-4"></i>
                                {{ $level->name }}
                            </a>
                        @endforeach
                    </div>
                </div>

            </div>
        </div> <!-- AQUÍ CIERRA EL BLOQUE GRIS COMPLETO -->

        <!-- 2. REJILLA DE CURSOS (BLOQUE TOTALMENTE INDEPENDIENTE) -->
        <div
            class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">
            @foreach ($courses as $course)
                <x-course-card :course="$course"></x-course-card>
            @endforeach
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-8">
            {{ $courses->links() }}

        </div>
    </div>
</div>
