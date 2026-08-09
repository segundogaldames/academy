<x-app-layout>
    {{-- CSS de CKEditor --}}
    <style>
        .ck-editor__editable_inline {
            min-height: 250px !important;
        }

        .ck-content ul {
            list-style-type: disc !important;
            padding-left: 1.5rem !important;
        }

        .ck-content ol {
            list-style-type: decimal !important;
            padding-left: 1.5rem !important;
        }
    </style>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 grid grid-cols-5 gap-2">
        <aside>
            <h1 class="font-bold text-lg mb-4 border-b-2 border-gray-500">Edición del Curso</h1>
            <ul class="text-sm text-gray-600">
                <li class="leading-7 mb-1 border-l-4 border-indigo-400 pl-2"><a href="">Detalle</a></li>
                <li class="leading-7 mb-1 border-l-4 border-transparent pl-2"><a href="">Lecciones</a></li>
                <li class="leading-7 mb-1 border-l-4 border-transparent pl-2"><a href="">Metas</a></li>
                <li class="leading-7 mb-1 border-l-4 border-transparent pl-2"><a href="">Estudiantes</a></li>
            </ul>
        </aside>
        <div class="col-span-4 bg-white shadow-lg rounded overflow-hidden">
            <div class="px-6 py-4 text-gray-600">
                <h1 class="uppercase font-bold text-2xl border-b-2 pb-2 border-gray-400">Detalle del Curso</h1>
                <form action="{{ route('instructor.courses.update', $course) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label for="title">Título</label>
                        <input type="text" name="title" id="title"
                            value="{{ old('title', $course->title ?? '') }}"
                            class="w-full aria-disabled:cursor-not-allowed outline-none focus:outline-none text-stone-800 dark:text-white placeholder:text-stone-600/60 ring-transparent border border-stone-200 transition-all ease-in disabled:opacity-50 disabled:pointer-events-none select-none text-sm py-2 px-2.5 ring shadow-sm bg-white rounded-lg duration-100 hover:border-stone-300 hover:ring-none focus:border-stone-400 focus:ring-none peer">
                    </div>
                    <div class="mb-4">
                        <label for="slug">Slug</label>
                        <input type="text" name="slug" id="slug"
                            class="w-full aria-disabled:cursor-not-allowed outline-none focus:outline-none text-stone-800 dark:text-white placeholder:text-stone-600/60 ring-transparent border border-stone-200 transition-all ease-in disabled:opacity-50 disabled:pointer-events-none select-none text-sm py-2 px-2.5 ring shadow-sm bg-white rounded-lg duration-100 hover:border-stone-300 hover:ring-none focus:border-stone-400 focus:ring-none peer">
                    </div>
                    <div class="mb-4">
                        <label for="subtitle">Subtítulo</label>
                        <input type="text" name="subtitle" id="subtitle"
                            value="{{ old('subtitle', $course->subtitle ?? '') }}"
                            class="w-full aria-disabled:cursor-not-allowed outline-none focus:outline-none text-stone-800 dark:text-white placeholder:text-stone-600/60 ring-transparent border border-stone-200 transition-all ease-in disabled:opacity-50 disabled:pointer-events-none select-none text-sm py-2 px-2.5 ring shadow-sm bg-white rounded-lg duration-100 hover:border-stone-300 hover:ring-none focus:border-stone-400 focus:ring-none peer">
                    </div>
                    <div class="mb-4">
                        <label for="description">Descripción</label>

                        <textarea rows="8" placeholder="Message here..." name="description" id="description"
                            class="w-full aria-disabled:cursor-not-allowed outline-none focus:outline-none text-stone-800 dark:text-white placeholder:text-stone-600/60 ring-transparent border border-stone-200 transition-all ease-in disabled:opacity-50 disabled:pointer-events-none select-none text-sm py-2 px-2.5 ring shadow-sm bg-white rounded-lg duration-100 hover:border-stone-300 hover:ring-none focus:border-stone-400 focus:ring-none peer"
                            style="resize: none">{{ old('subtitle', $course->subtitle ?? '') }}</textarea>

                    </div>
                    <div class="mb-4 grid grid-cols-3 gap-4">
                        <div>
                            <label for="category">Categoría</label>
                            <select name="category" id="category"
                                class="w-full aria-disabled:cursor-not-allowed outline-none focus:outline-none text-stone-800 dark:text-white placeholder:text-stone-600/60 ring-transparent border border-stone-200 transition-all ease-in disabled:opacity-50 disabled:pointer-events-none select-none text-sm py-2 px-2.5 ring shadow-sm bg-white rounded-lg duration-100 hover:border-stone-300 hover:ring-none focus:border-stone-400 focus:ring-none peer">
                                <option value="" disabled>-- Selecciona un precio --</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" @selected(old('category_id', $course->category_id) == $category->id)>
                                        {{ $category->name }} </option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="level">Nivel</label>
                            <select name="level" id="level"
                                class="w-full aria-disabled:cursor-not-allowed outline-none focus:outline-none text-stone-800 dark:text-white placeholder:text-stone-600/60 ring-transparent border border-stone-200 transition-all ease-in disabled:opacity-50 disabled:pointer-events-none select-none text-sm py-2 px-2.5 ring shadow-sm bg-white rounded-lg duration-100 hover:border-stone-300 hover:ring-none focus:border-stone-400 focus:ring-none peer">
                                <option value="" disabled>-- Selecciona un precio --</option>
                                @foreach ($levels as $level)
                                    <option value="{{ $level->id }}" @selected(old('level_id', $course->level_id) == $level->id)>
                                        {{ $level->name }} </option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="price">Precio (CLP)</label>
                            <select name="price" id="price"
                                class="w-full aria-disabled:cursor-not-allowed outline-none focus:outline-none text-stone-800 dark:text-white placeholder:text-stone-600/60 ring-transparent border border-stone-200 transition-all ease-in disabled:opacity-50 disabled:pointer-events-none select-none text-sm py-2 px-2.5 ring shadow-sm bg-white rounded-lg duration-100 hover:border-stone-300 hover:ring-none focus:border-stone-400 focus:ring-none peer">
                                <option value="" disabled>-- Selecciona un precio --</option>

                                @foreach ($prices as $price)
                                    <option value="{{ $price->id }}" @selected(old('price_id', $course->price_id) == $price->id)>
                                        ${{ number_format($price->price, 0, ',', '.') }} - {{ $price->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <h1 class="font-bold text-2xl mt-8 mb-2">Imagen del Curso</h1>
                    <div class="grid grid-cols-2 gap-4">
                        <figure>
                            <img id="picture" class="h-64 w-full object-cover"
                                src="{{ $course->image?->url && Storage::disk('public')->exists($course->image->url)
                                    ? Storage::url($course->image->url)
                                    : asset('img/home/curso1.jpg') }}"
                                alt="{{ $course->title ?? 'Curso sin img' }}">
                        </figure>
                        <div>
                            <p class="mb-2">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nihil sunt
                                minima nostrum ad!
                                Ex consequuntur omnis voluptates. Eos, sint molestias voluptatibus sed repellendus
                                ratione et, necessitatibus consectetur, doloribus deleniti blanditiis.</p>
                            <input type="file" name="file" id="file"
                                class="w-full aria-disabled:cursor-not-allowed outline-none focus:outline-none text-stone-800 dark:text-white placeholder:text-stone-600/60 ring-transparent border border-stone-200 transition-all ease-in disabled:opacity-50 disabled:pointer-events-none select-none text-sm py-2 px-2.5 ring shadow-sm bg-white rounded-lg duration-100 hover:border-stone-300 hover:ring-none focus:border-stone-400 focus:ring-none peer">
                        </div>
                    </div>
                    <div class="flex justify-end">
                        <button
                            class="inline-flex items-center justify-center border align-middle select-none font-sans font-medium text-center duration-300 ease-in disabled:opacity-50 disabled:shadow-none disabled:cursor-not-allowed focus:shadow-none text-md py-2 px-6 shadow-sm hover:shadow-md bg-stone-800 hover:bg-stone-700 relative bg-gradient-to-b from-stone-700 to-stone-800 border-stone-900 text-stone-50 rounded-lg hover:bg-gradient-to-b hover:from-stone-800 hover:to-stone-800 hover:border-stone-900 after:absolute after:inset-0 after:rounded-[inherit] after:box-shadow after:shadow-[inset_0_1px_0px_rgba(255,255,255,0.25),inset_0_-2px_0px_rgba(0,0,0,0.35)] after:pointer-events-none transition antialiased">Modificar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <x-slot name="js">
        <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>

        <script>
            document.getElementById("title").addEventListener('keyup', slugChange);

            function slugChange() {

                title = document.getElementById("title").value;
                document.getElementById("slug").value = slug(title);

            }

            function slug(str) {
                var $slug = '';
                var trimmed = str.trim(str);
                $slug = trimmed.replace(/[^a-z0-9-]/gi, '-').
                replace(/-+/g, '-').
                replace(/^-|-$/g, '');
                return $slug.toLowerCase();
            }


            document.addEventListener('DOMContentLoaded', () => {
                const descriptionElement = document.querySelector('#description');

                if (descriptionElement) {
                    ClassicEditor
                        .create(descriptionElement, {
                            // Personalización de la barra de herramientas
                            toolbar: [
                                'heading',
                                '|',
                                'bold',
                                'italic',
                                'link',
                                'blockQuote',

                            ]
                            // Al omitir 'link', 'uploadImage', 'insertTable' o 'mediaEmbed', se excluyen de la interfaz.
                        })
                        .then(editor => {
                            console.log('CKEditor 5 personalizado correctamente');
                        })
                        .catch(error => {
                            console.error('Error al inicializar CKEditor:', error);
                        });
                }
            });

            //Cambiar imagen
            document.getElementById("file").addEventListener('change', cambiarImagen);

            function cambiarImagen(event) {
                var file = event.target.files[0];

                var reader = new FileReader();
                reader.onload = (event) => {
                    document.getElementById("picture").setAttribute('src', event.target.result);
                };

                reader.readAsDataURL(file);
            }
        </script>
    </x-slot>
</x-app-layout>
