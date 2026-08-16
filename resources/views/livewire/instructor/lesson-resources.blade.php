<div>
    <div class="bg-white shadow-lg rounded overflow-hidden" x-data="{ open: false }">
        <div class="px-6 py-4 bg-gray-100">
            <header>
                <h1 class="text-xl font-bold cursor-pointer" @click="open = !open">Recursos:</h1>
            </header>
            <div class="border-t-2 my-2 pt-2 border-gray-400" x-show="open">
                @if (session()->has('success'))
                    <div role="alert"
                        class="relative flex items-start w-full border rounded-md p-2 bg-green-500 border-green-500 text-green-50">
                        <div class="w-full text-sm font-sans leading-none m-1.5">{{ session('success') }}</div>
                    </div>
                @endif
                @if ($lesson->resource)
                    <div class="flex justify-between items-center" wire:key="resource-preview-{{ $lesson->id }}">
                        <p><i wire:click="download" class="fas fa-download text-gray-500 cursor-pointer mr-1"></i>
                            {{ $lesson->resource->url }}
                        </p>
                        <i wire:click="destroy" wire:confirm="¿Estás seguro de que deseas eliminar esta imagen?"
                            class="fas fa-trash text-red-500 cursor-pointer"></i>
                    </div>
                @else
                    <form wire:submit.prevent="save" wire:key="resource-form-{{ $lesson->id }}">
                        <div class="flex items-center gap-2">
                            <input type="file" id="" wire:model.live="file"
                                class="w-full aria-disabled:cursor-not-allowed outline-none focus:outline-none text-stone-800 dark:text-white placeholder:text-stone-600/60 ring-transparent border border-stone-200 transition-all ease-in disabled:opacity-50 disabled:pointer-events-none select-none text-sm py-2 px-2.5 ring shadow-sm bg-white rounded-lg duration-100 hover:border-stone-300 hover:ring-none focus:border-stone-400 focus:ring-none peer">
                            <button type="submit"
                                class="inline-flex items-center justify-center border align-middle select-none font-sans font-medium text-center duration-300 ease-in disabled:opacity-50 disabled:shadow-none disabled:cursor-not-allowed focus:shadow-none text-sm py-2 px-4 shadow-sm hover:shadow-md bg-blue-500 hover:bg-info-light relative bg-gradient-to-b from-blue-500 to-blue-600 border-blue-600 text-stone-50 rounded-lg hover:bg-gradient-to-b hover:from-blue-600 hover:to-blue-600 hover:border-blue-600 after:absolute after:inset-0 after:rounded-[inherit] after:box-shadow after:shadow-[inset_0_1px_0px_rgba(255,255,255,0.35),inset_0_-2px_0px_rgba(0,0,0,0.18)] after:pointer-events-none transition antialiased">Subir</button>
                        </div>
                        <div class="text-blue-500 font-bold mt-1" wire:loading wire:target="file">
                            Cargando...
                        </div>
                        @error('file')
                            <span class="text-xs text-red-500">{{ $message }}</span>
                        @enderror
                    </form>
                @endif
            </div>
