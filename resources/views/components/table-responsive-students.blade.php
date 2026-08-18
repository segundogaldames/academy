<div class="w-full">
    <div class="mb-8 flex items-center justify-between gap-8">
        <div>
            <h6 class="font-sans antialiased font-bold text-base md:text-lg lg:text-xl text-current">Lista de Estudiantes
            </h6>
            <p class="font-sans antialiased text-base text-current mt-1">Los estudiantes que se han matriculado a tus
                cursos están aquí</p>
        </div>

    </div>
    <div class="flex flex-col items-center justify-between gap-4 md:flex-row">
        <div class="flex gap-2">
            <div role="tablist" class="relative flex shrink-0 rounded-md p-1 bg-stone-100 dark:bg-surface w-full md:w-max"
                aria-orientation="horizontal">
                <button role="tab"
                    class="inline-flex relative z-[2] py-1.5 px-3 items-center justify-center align-middle text-stone-800 dark:text-white select-none font-sans font-medium text-center text-sm aria-disabled:opacity-50 aria-disabled:pointer-events-none w-full"
                    aria-selected="true">All</button>
                <button role="tab"
                    class="inline-flex relative z-[2] py-1.5 px-3 items-center justify-center align-middle text-stone-800 dark:text-white select-none font-sans font-medium text-center text-sm aria-disabled:opacity-50 aria-disabled:pointer-events-none w-full"
                    aria-selected="false">Monitored</button>
                <button role="tab"
                    class="inline-flex relative z-[2] py-1.5 px-3 items-center justify-center align-middle text-stone-800 dark:text-white select-none font-sans font-medium text-center text-sm aria-disabled:opacity-50 aria-disabled:pointer-events-none w-full"
                    aria-selected="false">Unmonitored</button>
                <span style="width:0;height:0;left:0;top:0;position:absolute;z-index:1"
                    class="bg-white rounded shadow-sm shadow-stone-800/10 transition-all duration-300 ease-in"></span>
            </div>
        </div>
        <div class="w-full grid grid-cols-1 gap-4 md:grid-cols-2 md:items-center">
            <!-- Columna 1: Buscador -->
            <div>
                <input wire:model.live="search" placeholder="Search" type="text"
                    class="w-full aria-disabled:cursor-not-allowed outline-none focus:outline-none text-stone-800 dark:text-white placeholder:text-stone-600/60 ring-transparent border border-stone-200 transition-all ease-in disabled:opacity-50 disabled:pointer-events-none select-none text-sm py-2 px-2.5 ring shadow-sm bg-white rounded-lg duration-100 hover:border-stone-300 hover:ring-none focus:border-stone-400 focus:ring-none peer" />
            </div>

        </div>
    </div>
    <div class="mt-4 w-full overflow-hidden rounded-lg border border-stone-200">

        {{ $slot }}

    </div>

</div>
