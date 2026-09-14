<div class="form-group">
    <label for="name">Nombre</label>
    <input type="text" name="name" class="form-control @error('name') is-invalid @else '' @enderror" id="name"
        value="{{ old('name', $price->name ?? '') }}" placeholder="Nombre del precio">
    @error('name')
        <span class="invalid-feedback">
            {{ $message }}
        </span>
    @enderror
</div>
<div class="form-group">
    <label for="price">Precio $</label>
    <input type="number" name="price" class="form-control @error('price') is-invalid @else '' @enderror"
        id="price" value="{{ old('price', $price->price ?? '') }}" placeholder="Valor del precio">
    @error('price')
        <span class="invalid-feedback">
            {{ $message }}
        </span>
    @enderror
</div>
