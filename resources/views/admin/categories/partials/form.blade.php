<div class="form-group">
    <label for="category">Categoría</label>
    <input type="text" name="name" class="form-control @error('name') is-invalid @else '' @enderror" id="category"
        value="{{ old('name', $category->name ?? '') }}" placeholder="Nombre de la categoría">
    @error('name')
        <span class="invalid-feedback">
            {{ $message }}
        </span>
    @enderror
</div>
