<div>
    <article class="bg-white shadow-lg rounded overflow-hidden" x-data="{ open: false }">
        <div class="px-6 py-4 bg-gray-100">
            <header>
                <h1 @click="open = !open" class="text-xl font-bold cursor-pointer">Ver Descripción:</h1>

            </header>
            <div x-show="open" class="border-t-2 my-2 pt-2 border-gray-400">
                @if (session()->has('success'))
                    <div role="alert"
                        class="relative flex items-start w-full border rounded-md p-2 bg-green-500 border-green-500 text-green-50">
                        <div class="w-full text-sm font-sans leading-none m-1.5">{{ session('success') }}</div>
                    </div>
                @endif
                @if ($lesson->description)
                    <form wire:submit.prevent="update" wire:key="form-editar-{{ $lesson->id }}">
                        <div>
                            <textarea rows="4" id="" style="resize: none" wire:model.live="description"
                                class="w-full aria-disabled:cursor-not-allowed outline-none focus:outline-none text-stone-800 dark:text-white placeholder:text-stone-600/60 ring-transparent border border-stone-200 transition-all ease-in disabled:opacity-50 disabled:pointer-events-none select-none text-sm py-2 px-2.5 ring shadow-sm bg-white rounded-lg duration-100 hover:border-stone-300 hover:ring-none focus:border-stone-400 focus:ring-none peer"></textarea>

                        </div>
                        @error('description')
                            <span class="text-xs text-red-500">{{ $message }}</span>
                        @enderror
                        <div class="flex justify-end gap-2">
                            <button type="button" wire:click="destroy"
                                class="inline-flex items-center justify-center border align-middle select-none font-sans font-medium text-center duration-300 ease-in disabled:opacity-50 disabled:shadow-none disabled:cursor-not-allowed focus:shadow-none text-sm py-2 px-4 shadow-sm hover:shadow-md bg-red-500 hover:bg-error-light relative bg-gradient-to-b from-red-500 to-red-600 border-red-600 text-stone-50 rounded-lg hover:bg-gradient-to-b hover:from-red-600 hover:to-red-600 hover:border-red-600 after:absolute after:inset-0 after:rounded-[inherit] after:box-shadow after:shadow-[inset_0_1px_0px_rgba(255,255,255,0.35),inset_0_-2px_0px_rgba(0,0,0,0.18)] after:pointer-events-none transition antialiased">Eliminar</button>
                            <button type="submit"
                                class="inline-flex items-center justify-center border align-middle select-none font-sans font-medium text-center duration-300 ease-in disabled:opacity-50 disabled:shadow-none disabled:cursor-not-allowed focus:shadow-none text-sm py-2 px-4 shadow-sm hover:shadow-md bg-amber-500 hover:bg-warning-light relative bg-gradient-to-b from-orange-500 to-orange-600 border-orange-600 text-stone-50 rounded-lg hover:bg-gradient-to-b hover:from-orange-600 hover:to-orange-600 hover:border-orange-600 after:absolute after:inset-0 after:rounded-[inherit] after:box-shadow after:shadow-[inset_0_1px_0px_rgba(255,255,255,0.35),inset_0_-2px_0px_rgba(0,0,0,0.18)] after:pointer-events-none transition antialiased">Actualizar</button>
                        </div>
                    </form>
                @else
                    <form wire:submit.prevent="store" wire:key="form-crear">
                        <div>
                            <textarea rows="4" id="" style="resize: none" wire:model.live="description"
                                placeholder="Agregue una descripción a la lección"
                                class="w-full aria-disabled:cursor-not-allowed outline-none focus:outline-none text-stone-800 dark:text-white placeholder:text-stone-600/60 ring-transparent border border-stone-200 transition-all ease-in disabled:opacity-50 disabled:pointer-events-none select-none text-sm py-2 px-2.5 ring shadow-sm bg-white rounded-lg duration-100 hover:border-stone-300 hover:ring-none focus:border-stone-400 focus:ring-none peer"></textarea>

                        </div>
                        @error('description')
                            <span class="text-xs text-red-500">{{ $message }}</span>
                        @enderror
                        <div class="flex justify-end gap-2">

                            <button type="submit"
                                class="inline-flex items-center justify-center border align-middle select-none font-sans font-medium text-center duration-300 ease-in disabled:opacity-50 disabled:shadow-none disabled:cursor-not-allowed focus:shadow-none text-sm py-2 px-4 shadow-sm hover:shadow-md bg-green-500 hover:bg-success-light relative bg-gradient-to-b from-green-500 to-green-600 border-green-600 text-stone-50 rounded-lg hover:bg-gradient-to-b hover:from-green-600 hover:to-green-600 hover:border-green-600 after:absolute after:inset-0 after:rounded-[inherit] after:box-shadow after:shadow-[inset_0_1px_0px_rgba(255,255,255,0.35),inset_0_-2px_0px_rgba(0,0,0,0.18)] after:pointer-events-none transition antialiased">Crear</button>
                        </div>
                    </form>
                @endif
            </div>
        </div>
    </article>
</div>
