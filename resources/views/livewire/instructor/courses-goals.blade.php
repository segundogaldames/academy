<div x-data="{ open: false }">
    <section>
        <h1 @click="open = !open"
            class="uppercase pl-3 font-bold text-xl border-b-2 mb-2 py-2 border-gray-300 cursor-pointer rounded-lg transition-colors duration-200 hover:bg-gray-300">
            Metas
            del
            Curso</h1>
        <div x-show="open">
            @if (session('success'))
                <div role="alert"
                    class="relative flex items-start w-full border rounded-md p-2 mb-6 bg-green-500 border-green-500 text-green-50 mt-4">
                    <div class="w-full text-sm font-sans leading-none m-1.5"> {{ session('success') }} </div>
                </div>
            @endif
            @foreach ($course->goals as $item)
                <article class="bg-white shadow-lg rounded overflow-hidden mb-4">
                    <div class="px-6 py-4 bg-gray-100">
                        @if ($goal->id == $item->id)
                            <form wire:submit.prevent="update" wire:key="update-{{ $item->id }}">
                                <div>
                                    <input type="text" id="" wire:model.live="name"
                                        wire:keydown.escape="cancel" autofocus
                                        class="w-full aria-disabled:cursor-not-allowed outline-none focus:outline-none text-stone-800 dark:text-white placeholder:text-stone-600/60 ring-transparent border border-stone-200 transition-all ease-in disabled:opacity-50 disabled:pointer-events-none select-none text-sm py-2 px-2.5 ring shadow-sm bg-white rounded-lg duration-100 hover:border-stone-300 hover:ring-none focus:border-stone-400 focus:ring-none peer">
                                </div>
                                <div class="text-xs text-gray-400 mt-1">Presiona Esc para cancelar</div>
                                @error('name')
                                    <span class="text-xs text-red-500">{{ $message }}</span>
                                @enderror
                            </form>
                        @endif
                        <header class="flex justify-between">
                            <h1 class="text-xl font-bold cursor-pointer"> {{ $item->name }} </h1>
                            <div>
                                <i class="fas fa-edit text-blue-500 cursor-pointer mr-2"
                                    wire:click="edit({{ $item }})"></i>
                                <i wire:click="destroy({{ $item }})"
                                    wire:confirm="¿Estás seguro de eliminar esta meta?"
                                    class="fas fa-trash text-red-500 cursor-pointer"></i>

                            </div>
                        </header>
                    </div>
                </article>
            @endforeach
            @if (!$goal->id)
                <article class="bg-white shadow-lg rounded overflow-hidden">
                    <div class="px-6 py-4 bg-gray-100">
                        <form wire:submit.prevent="store" wire:key="store">
                            <div>
                                <input type="text" id="" wire:model.live="name"
                                    placeholder="Agregar una nueva meta"
                                    class="w-full aria-disabled:cursor-not-allowed outline-none focus:outline-none text-stone-800 dark:text-white placeholder:text-stone-600/60 ring-transparent border border-stone-200 transition-all ease-in disabled:opacity-50 disabled:pointer-events-none select-none text-sm py-2 px-2.5 ring shadow-sm bg-white rounded-lg duration-100 hover:border-stone-300 hover:ring-none focus:border-stone-400 focus:ring-none peer">
                            </div>
                            @error('name')
                                <span class="text-xs text-red-500">{{ $message }}</span>
                            @enderror
                            <div class="flex justify-end mt-4">
                                <button type="submit"
                                    class="inline-flex items-center justify-center border align-middle select-none font-sans font-medium text-center duration-300 ease-in disabled:opacity-50 disabled:shadow-none disabled:cursor-not-allowed focus:shadow-none text-sm py-2 px-4 shadow-sm hover:shadow-md bg-blue-500 hover:bg-info-light relative bg-gradient-to-b from-blue-500 to-blue-600 border-blue-600 text-stone-50 rounded-lg hover:bg-gradient-to-b hover:from-blue-600 hover:to-blue-600 hover:border-blue-600 after:absolute after:inset-0 after:rounded-[inherit] after:box-shadow after:shadow-[inset_0_1px_0px_rgba(255,255,255,0.35),inset_0_-2px_0px_rgba(0,0,0,0.18)] after:pointer-events-none transition antialiased">Guardar</button>
                            </div>
                        </form>
                    </div>
                </article>
            @endif

        </div>
    </section>
</div>
