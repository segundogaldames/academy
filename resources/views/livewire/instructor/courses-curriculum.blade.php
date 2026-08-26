<div>

    @if (session('success'))
        <div role="alert"
            class="relative flex items-start w-full border rounded-md p-2 mb-6 bg-green-500 border-green-500 text-green-50">
            <div class="w-full text-sm font-sans leading-none m-1.5"> {{ session('success') }} </div>
        </div>
    @endif
    <h1 class="uppercase font-bold text-2xl border-b-2 pb-2 border-gray-400">Lecciones del Curso</h1>

    @foreach ($course->sections as $item)
        <article class="bg-white shadow-lg rounded overflow-hidden mb-6 mt-4" wire:key="section-{{ $item->id }}"
            x-data="{ open: true }">
            <div class="px-6 py-4 bg-gray-100">

                @if ($section->id == $item->id)
                    {{-- Formulario de edición --}}
                    <form wire:submit.prevent="update">
                        <input id=""
                            class="w-full aria-disabled:cursor-not-allowed outline-none focus:outline-none text-stone-800 dark:text-white placeholder:text-stone-600/60 ring-transparent transition-all ease-in disabled:opacity-50 disabled:pointer-events-none select-none text-sm py-2 px-2.5 ring shadow-sm bg-white rounded-lg duration-100 hover:ring-none focus:ring-none peer border"
                            type="text" wire:model.live="name" wire:keydown.enter.prevent="update"
                            wire:keydown.escape="cancel" placeholder="Ingrese el nombre de la sección">

                        @error('name')
                            <span class="text-xs text-red-500">{{ $message }}</span>
                        @enderror
                    </form>
                @else
                    {{-- Encabezado normal --}}
                    <header class="flex justify-between items-center">
                        <h1 class="cursor-pointer" x-on:click="open = !open">
                            <strong>Sección:</strong> {{ $item->name }}
                        </h1>
                        <div>
                            <i class="fas fa-edit cursor-pointer text-blue-500"
                                wire:click="edit({{ $item }})"></i>
                            <i class="fas fa-eraser cursor-pointer text-red-500"
                                wire:click="destroy({{ $item }})"></i>
                        </div>

                    </header>
                    <div x-show="open">
                        @livewire('instructor.courses-lesson', ['section' => $item], key($item->id))
                    </div>
                @endif

            </div>
        </article>
    @endforeach
    <div x-data="{ open: false }">
        <a x-show="!open" class="cursor-pointer flex items-center" @click="open = true">
            <i class="far fa-plus-square text-2xl text-red-500 mr-2"></i>
            Agregar Sección
        </a>
        <article class="bg-white shadow-lg rounded overflow-hidden" x-show="open">
            <div class="px-6 py-4 bg-gray-100">
                <h1 class="text-xl font-bold">Nueva Sección</h1>
                <div>
                    <input id=""
                        class="w-full aria-disabled:cursor-not-allowed outline-none focus:outline-none text-stone-800 dark:text-white placeholder:text-stone-600/60 ring-transparent transition-all ease-in disabled:opacity-50 disabled:pointer-events-none select-none text-sm py-2 px-2.5 ring shadow-sm bg-white rounded-lg duration-100 hover:ring-none focus:ring-none peer border"
                        type="text" placeholder="Escriba el nombre de la sección" wire:model.live="name">
                    @error('name')
                        <span class="text-xs text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex justify-end gap-2 mt-4">
                    <button
                        class="inline-flex items-center justify-center border align-middle select-none font-sans font-medium text-center duration-300 ease-in disabled:opacity-50 disabled:shadow-none disabled:cursor-not-allowed focus:shadow-none text-sm py-2 px-4 shadow-sm hover:shadow-md bg-red-500 hover:bg-error-light relative bg-gradient-to-b from-red-500 to-red-600 border-red-600 text-stone-50 rounded-lg hover:bg-gradient-to-b hover:from-red-600 hover:to-red-600 hover:border-red-600 after:absolute after:inset-0 after:rounded-[inherit] after:box-shadow after:shadow-[inset_0_1px_0px_rgba(255,255,255,0.35),inset_0_-2px_0px_rgba(0,0,0,0.18)] after:pointer-events-none transition antialiased"
                        @click="open = false">Cancelar</button>
                    <button
                        class="inline-flex items-center justify-center border align-middle select-none font-sans font-medium text-center duration-300 ease-in disabled:opacity-50 disabled:shadow-none disabled:cursor-not-allowed focus:shadow-none text-sm py-2 px-4 shadow-sm hover:shadow-md bg-green-500 hover:bg-success-light relative bg-gradient-to-b from-green-500 to-green-600 border-green-600 text-stone-50 rounded-lg hover:bg-gradient-to-b hover:from-green-600 hover:to-green-600 hover:border-green-600 after:absolute after:inset-0 after:rounded-[inherit] after:box-shadow after:shadow-[inset_0_1px_0px_rgba(255,255,255,0.35),inset_0_-2px_0px_rgba(0,0,0,0.18)] after:pointer-events-none transition antialiased"
                        wire:click="store" @click="open = false">Agregar</button>
                </div>
            </div>
        </article>
    </div>
</div>
