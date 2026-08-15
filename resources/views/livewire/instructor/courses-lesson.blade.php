<div>
    @foreach ($section->lessons as $item)
        <article class="bg-white shadow-lg rounded overflow-hidden mt-4">
            <div class="px-6 py-4">
                @if ($lesson && $lesson->id == $item->id)
                    <div>
                        <div class="flex items-center">
                            <label for="name" class="w-32">Nombre:</label>
                            <input id=""
                                class="w-full aria-disabled:cursor-not-allowed outline-none focus:outline-none text-stone-800 dark:text-white placeholder:text-stone-600/60 ring-transparent transition-all ease-in disabled:opacity-50 disabled:pointer-events-none select-none text-sm py-2 px-2.5 ring shadow-sm bg-white rounded-lg duration-100 hover:ring-none focus:ring-none peer border"
                                type="text" wire:model.live="name" wire:keydown.enter.prevent="update"
                                wire:keydown.escape="cancel" placeholder="Ingrese el nombre de la lección">
                        </div>
                        @error('name')
                            <span class="text-xs text-red-500">{{ $message }}</span>
                        @enderror
                        <div class="flex items-center mt-4">
                            <label for="name" class="w-32">Plataforma:</label>
                            <select id="" wire:model.live="platform_id" wire:keydown.enter.prevent="update"
                                wire:keydown.escape="cancel"
                                class="w-full aria-disabled:cursor-not-allowed outline-none focus:outline-none text-stone-800 dark:text-white placeholder:text-stone-600/60 ring-transparent transition-all ease-in disabled:opacity-50 disabled:pointer-events-none select-none text-sm py-2 px-2.5 ring shadow-sm bg-white rounded-lg duration-100 hover:ring-none focus:ring-none peer border">
                                @foreach ($platforms as $platform)
                                    <option value="{{ $platform->id }}"> {{ $platform->name }} </option>
                                @endforeach
                            </select>
                        </div>
                        @error('platform_id')
                            <span class="text-xs text-red-500">{{ $message }}</span>
                        @enderror
                        <div class="flex items-center mt-4">
                            <label for="url" class="w-32">URL:</label>
                            <input id=""
                                class="w-full aria-disabled:cursor-not-allowed outline-none focus:outline-none text-stone-800 dark:text-white placeholder:text-stone-600/60 ring-transparent transition-all ease-in disabled:opacity-50 disabled:pointer-events-none select-none text-sm py-2 px-2.5 ring shadow-sm bg-white rounded-lg duration-100 hover:ring-none focus:ring-none peer border"
                                type="text" wire:model.live="url" wire:keydown.enter.prevent="update"
                                wire:keydown.escape="cancel" placeholder="Ingrese la url de la lección">
                        </div>
                        @error('url')
                            <span class="text-xs text-red-500">{{ $message }}</span>
                        @enderror
                        <div class="mt-4 flex justify-end gap-2">
                            <button wire:click="cancel"
                                class="inline-flex items-center justify-center border align-middle select-none font-sans font-medium text-center duration-300 ease-in disabled:opacity-50 disabled:shadow-none disabled:cursor-not-allowed focus:shadow-none text-sm py-2 px-4 shadow-sm hover:shadow-md bg-red-500 hover:bg-error-light relative bg-gradient-to-b from-red-500 to-red-600 border-red-600 text-stone-50 rounded-lg hover:bg-gradient-to-b hover:from-red-600 hover:to-red-600 hover:border-red-600 after:absolute after:inset-0 after:rounded-[inherit] after:box-shadow after:shadow-[inset_0_1px_0px_rgba(255,255,255,0.35),inset_0_-2px_0px_rgba(0,0,0,0.18)] after:pointer-events-none transition antialiased">Cancelar</button>
                            <button wire:click="update"
                                class="inline-flex items-center justify-center border align-middle select-none font-sans font-medium text-center duration-300 ease-in disabled:opacity-50 disabled:shadow-none disabled:cursor-not-allowed focus:shadow-none text-sm py-2 px-4 shadow-sm hover:shadow-md bg-green-500 hover:bg-success-light relative bg-gradient-to-b from-green-500 to-green-600 border-green-600 text-stone-50 rounded-lg hover:bg-gradient-to-b hover:from-green-600 hover:to-green-600 hover:border-green-600 after:absolute after:inset-0 after:rounded-[inherit] after:box-shadow after:shadow-[inset_0_1px_0px_rgba(255,255,255,0.35),inset_0_-2px_0px_rgba(0,0,0,0.18)] after:pointer-events-none transition antialiased">Actualizar</button>
                        </div>
                    </div>
                @else
                    <header>
                        <h1><i
                                class="far
                                fa-play-circle text-blue-500 mr-1"></i>Lección:
                            {{ $item->name }} </h1>
                    </header>
                    <div class="border-t-2 my-2">
                        <p class="text-sm mt-2">Plataforma: {{ $item->platform->name }} </p>
                        <p class="text-sm">Enlace: <a href="{{ $item->url }}" target="_blank" class="text-blue-600">
                                {{ $item->url }} </a></p>

                        <div>
                            <button
                                class="inline-flex items-center justify-center border align-middle select-none font-sans font-medium text-center duration-300 ease-in disabled:opacity-50 disabled:shadow-none disabled:cursor-not-allowed focus:shadow-none text-sm py-2 px-4 shadow-sm hover:shadow-md bg-blue-500 hover:bg-info-light relative bg-gradient-to-b from-blue-500 to-blue-600 border-blue-600 text-stone-50 rounded-lg hover:bg-gradient-to-b hover:from-blue-600 hover:to-blue-600 hover:border-blue-600 after:absolute after:inset-0 after:rounded-[inherit] after:box-shadow after:shadow-[inset_0_1px_0px_rgba(255,255,255,0.35),inset_0_-2px_0px_rgba(0,0,0,0.18)] after:pointer-events-none transition antialiased"
                                wire:click="edit({{ $item }})">Editar</button>
                            <button wire:click="destroy({{ $item }})"
                                class="inline-flex items-center justify-center border align-middle select-none font-sans font-medium text-center duration-300 ease-in disabled:opacity-50 disabled:shadow-none disabled:cursor-not-allowed focus:shadow-none text-sm py-2 px-4 shadow-sm hover:shadow-md bg-red-500 hover:bg-error-light relative bg-gradient-to-b from-red-500 to-red-600 border-red-600 text-stone-50 rounded-lg hover:bg-gradient-to-b hover:from-red-600 hover:to-red-600 hover:border-red-600 after:absolute after:inset-0 after:rounded-[inherit] after:box-shadow after:shadow-[inset_0_1px_0px_rgba(255,255,255,0.35),inset_0_-2px_0px_rgba(0,0,0,0.18)] after:pointer-events-none transition antialiased">Eliminar</button>
                        </div>
                    </div>
                @endif
            </div>
        </article>
    @endforeach
    <div x-data="{ open: false }" class="mt-4">
        <a x-show="!open" class="cursor-pointer flex items-center" @click="open = true">
            <i class="far fa-plus-square text-2xl text-red-500 mr-2"></i>
            Agregar Lección
        </a>
        <article class="bg-white shadow-lg rounded overflow-hidden" x-show="open">
            <div class="px-6 py-4">
                <h1 class="text-xl font-bold">Nueva Lección</h1>
                <div class="flex items-center">
                    <label for="name" class="w-32">Nombre:</label>
                    <input id="" wire:model.live="name"
                        class="w-full aria-disabled:cursor-not-allowed outline-none focus:outline-none text-stone-800 dark:text-white placeholder:text-stone-600/60 ring-transparent transition-all ease-in disabled:opacity-50 disabled:pointer-events-none select-none text-sm py-2 px-2.5 ring shadow-sm bg-white rounded-lg duration-100 hover:ring-none focus:ring-none peer border"
                        type="text" placeholder="Ingrese el nombre de la lección">
                </div>
                @error('name')
                    <span class="text-xs text-red-500">{{ $message }}</span>
                @enderror
                <div class="flex items-center mt-4">
                    <label for="name" class="w-32">Plataforma:</label>
                    <select id="" wire:model.live="platform_id"
                        class="w-full aria-disabled:cursor-not-allowed outline-none focus:outline-none text-stone-800 dark:text-white placeholder:text-stone-600/60 ring-transparent transition-all ease-in disabled:opacity-50 disabled:pointer-events-none select-none text-sm py-2 px-2.5 ring shadow-sm bg-white rounded-lg duration-100 hover:ring-none focus:ring-none peer border">
                        @foreach ($platforms as $platform)
                            <option value="{{ $platform->id }}"> {{ $platform->name }} </option>
                        @endforeach
                    </select>
                </div>
                @error('platform_id')
                    <span class="text-xs text-red-500">{{ $message }}</span>
                @enderror
                <div class="flex items-center mt-4">
                    <label for="url" class="w-32">URL:</label>
                    <input id="" wire:model.live="url"
                        class="w-full aria-disabled:cursor-not-allowed outline-none focus:outline-none text-stone-800 dark:text-white placeholder:text-stone-600/60 ring-transparent transition-all ease-in disabled:opacity-50 disabled:pointer-events-none select-none text-sm py-2 px-2.5 ring shadow-sm bg-white rounded-lg duration-100 hover:ring-none focus:ring-none peer border"
                        type="text" placeholder="Ingrese la url de la lección">
                </div>
                @error('url')
                    <span class="text-xs text-red-500">{{ $message }}</span>
                @enderror
                <div class="mt-4 flex justify-end gap-2">
                    <button wire:click="cancel" @click="open = false"
                        class="inline-flex items-center justify-center border align-middle select-none font-sans font-medium text-center duration-300 ease-in disabled:opacity-50 disabled:shadow-none disabled:cursor-not-allowed focus:shadow-none text-sm py-2 px-4 shadow-sm hover:shadow-md bg-red-500 hover:bg-error-light relative bg-gradient-to-b from-red-500 to-red-600 border-red-600 text-stone-50 rounded-lg hover:bg-gradient-to-b hover:from-red-600 hover:to-red-600 hover:border-red-600 after:absolute after:inset-0 after:rounded-[inherit] after:box-shadow after:shadow-[inset_0_1px_0px_rgba(255,255,255,0.35),inset_0_-2px_0px_rgba(0,0,0,0.18)] after:pointer-events-none transition antialiased">Cancelar</button>
                    <button wire:click="store" @click.stop="open = false"
                        class="inline-flex items-center justify-center border align-middle select-none font-sans font-medium text-center duration-300 ease-in disabled:opacity-50 disabled:shadow-none disabled:cursor-not-allowed focus:shadow-none text-sm py-2 px-4 shadow-sm hover:shadow-md bg-green-500 hover:bg-success-light relative bg-gradient-to-b from-green-500 to-green-600 border-green-600 text-stone-50 rounded-lg hover:bg-gradient-to-b hover:from-green-600 hover:to-green-600 hover:border-green-600 after:absolute after:inset-0 after:rounded-[inherit] after:box-shadow after:shadow-[inset_0_1px_0px_rgba(255,255,255,0.35),inset_0_-2px_0px_rgba(0,0,0,0.18)] after:pointer-events-none transition antialiased">Agregar</button>
                </div>
            </div>
        </article>
    </div>
</div>
