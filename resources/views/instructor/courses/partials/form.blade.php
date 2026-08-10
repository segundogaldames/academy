@csrf
<div class="mb-4">
    <label for="title">Título</label>
    <input type="text" name="title" id="title" value="{{ old('title', $course->title ?? '') }}"
        class="w-full aria-disabled:cursor-not-allowed outline-none focus:outline-none text-stone-800 dark:text-white placeholder:text-stone-600/60 ring-transparent transition-all ease-in disabled:opacity-50 disabled:pointer-events-none select-none text-sm py-2 px-2.5 ring shadow-sm bg-white rounded-lg duration-100 hover:ring-none focus:ring-none peer border {{ $errors->has('title') ? 'border-red-500 focus:border-red-500' : 'border-stone-200 hover:border-stone-300 focus:border-stone-400' }}">

    @error('title')
        <span class="text-xs text-red-600">{{ $message }}</span>
    @enderror
</div>
<div class="mb-4">
    <label for="slug">Slug</label>
    <input type="text" name="slug" id="slug"
        class="w-full aria-disabled:cursor-not-allowed outline-none focus:outline-none text-stone-800 dark:text-white placeholder:text-stone-600/60 ring-transparent transition-all ease-in disabled:opacity-50 disabled:pointer-events-none select-none text-sm py-2 px-2.5 ring shadow-sm bg-white rounded-lg duration-100 hover:ring-none focus:ring-none peer border {{ $errors->has('slug') ? 'border-red-500 focus:border-red-500' : 'border-stone-200 hover:border-stone-300 focus:border-stone-400' }}"
        readonly>
    @error('slug')
        <span class="text-xs text-red-600"> {{ $message }} </span>
    @enderror
</div>
<div class="mb-4">
    <label for="subtitle">Subtítulo</label>
    <input type="text" name="subtitle" id="subtitle" value="{{ old('subtitle', $course->subtitle ?? '') }}"
        class="w-full aria-disabled:cursor-not-allowed outline-none focus:outline-none text-stone-800 dark:text-white placeholder:text-stone-600/60 ring-transparent transition-all ease-in disabled:opacity-50 disabled:pointer-events-none select-none text-sm py-2 px-2.5 ring shadow-sm bg-white rounded-lg duration-100 hover:ring-none focus:ring-none peer border {{ $errors->has('subtitle') ? 'border-red-500 focus:border-red-500' : 'border-stone-200 hover:border-stone-300 focus:border-stone-400' }}">
    @error('subtitle')
        <span class="text-xs text-red-600"> {{ $message }} </span>
    @enderror
</div>
<div class="mb-4">
    <label for="description">Descripción</label>

    <textarea rows="8" placeholder="Message here..." name="description" id="description"
        class="w-full aria-disabled:cursor-not-allowed outline-none text-stone-800 dark:text-white placeholder:text-stone-600/60 transition-all ease-in disabled:opacity-50 disabled:pointer-events-none select-none text-sm py-2 px-2.5 shadow-sm bg-white rounded-lg duration-100 peer border {{ $errors->has('description') ? 'border-red-500 focus:border-red-500 focus:ring-1 focus:ring-red-500' : 'border-stone-200 hover:border-stone-300 focus:border-stone-400' }}"
        style="resize: none">{{ old('description', $course->description ?? '') }}</textarea>

    @error('description')
        <span class="text-xs text-red-600">{{ $message }}</span>
    @enderror

</div>
<div class="mb-4 grid grid-cols-3 gap-4">
    <div>
        <label for="category">Categoría</label>
        <select name="category" id="category"
            class="w-full aria-disabled:cursor-not-allowed outline-none focus:outline-none text-stone-800 dark:text-white placeholder:text-stone-600/60 ring-transparent transition-all ease-in disabled:opacity-50 disabled:pointer-events-none select-none text-sm py-2 px-2.5 ring shadow-sm bg-white rounded-lg duration-100 hover:ring-none focus:ring-none peer border {{ $errors->has('category') ? 'border-red-500 focus:border-red-500' : 'border-stone-200 hover:border-stone-300 focus:border-stone-400' }}">
            <option value="" disabled>-- Selecciona un precio --</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" @selected(old('category_id', $course->category_id ?? null) == $category->id)>
                    {{ $category->name }} </option>
            @endforeach
        </select>
        @error('category')
            <span class="text-xs text-red-600"> {{ $message }} </span>
        @enderror
    </div>
    <div>
        <label for="level">Nivel</label>
        <select name="level" id="level"
            class="w-full aria-disabled:cursor-not-allowed outline-none focus:outline-none text-stone-800 dark:text-white placeholder:text-stone-600/60 ring-transparent transition-all ease-in disabled:opacity-50 disabled:pointer-events-none select-none text-sm py-2 px-2.5 ring shadow-sm bg-white rounded-lg duration-100 hover:ring-none focus:ring-none peer border {{ $errors->has('level') ? 'border-red-500 focus:border-red-500' : 'border-stone-200 hover:border-stone-300 focus:border-stone-400' }}">
            <option value="" disabled>-- Selecciona un precio --</option>
            @foreach ($levels as $level)
                <option value="{{ $level->id }}" @selected(old('level_id', $course->level_id ?? null) == $level->id)>
                    {{ $level->name }} </option>
            @endforeach
        </select>
        @error('level')
            <span class="text-xs text-red-600"> {{ $message }} </span>
        @enderror
    </div>
    <div>
        <label for="price">Precio (CLP)</label>
        <select name="price" id="price"
            class="w-full aria-disabled:cursor-not-allowed outline-none focus:outline-none text-stone-800 dark:text-white placeholder:text-stone-600/60 ring-transparent transition-all ease-in disabled:opacity-50 disabled:pointer-events-none select-none text-sm py-2 px-2.5 ring shadow-sm bg-white rounded-lg duration-100 hover:ring-none focus:ring-none peer border {{ $errors->has('price') ? 'border-red-500 focus:border-red-500' : 'border-stone-200 hover:border-stone-300 focus:border-stone-400' }}">
            <option value="" disabled>-- Selecciona un precio --</option>

            @foreach ($prices as $price)
                <option value="{{ $price->id }}" @selected(old('price_id', $course->price_id ?? null) == $price->id)>
                    ${{ number_format($price->price, 0, ',', '.') }} - {{ $price->name }}
                </option>
            @endforeach
        </select>
        @error('price')
            <span class="text-xs text-red-600"> {{ $message }} </span>
        @enderror
    </div>
</div>
<h1 class="font-bold text-2xl mt-8 mb-2">Imagen del Curso</h1>
<div class="grid grid-cols-2 gap-4">
    <figure>
        @isset($course->image)
            <img id="picture" class="h-64 w-full object-cover"
                src="{{ $course->image?->url && Storage::disk('public')->exists($course->image->url)
                    ? Storage::url($course->image->url)
                    : asset('img/home/curso1.jpg') }}"
                alt="{{ $course->title ?? 'Curso sin img' }}">
        @else
            <img id="picture" src="{{ asset('img/home/curso1.jpg') }}" alt="" class="h-64 w-full object-cover">
        @endisset
    </figure>
    <div>
        <p class="mb-2">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nihil sunt
            minima nostrum ad!
            Ex consequuntur omnis voluptates. Eos, sint molestias voluptatibus sed repellendus
            ratione et, necessitatibus consectetur, doloribus deleniti blanditiis.</p>
        <input type="file" name="file" id="file"
            class="w-full aria-disabled:cursor-not-allowed outline-none focus:outline-none text-stone-800 dark:text-white placeholder:text-stone-600/60 ring-transparent border border-stone-200 transition-all ease-in disabled:opacity-50 disabled:pointer-events-none select-none text-sm py-2 px-2.5 ring shadow-sm bg-white rounded-lg duration-100 hover:border-stone-300 hover:ring-none focus:border-stone-400 focus:ring-none peer">
        @error('file')
            <span class="text-xs text-red-600"> {{ $message }} </span>
        @enderror
    </div>
</div>
