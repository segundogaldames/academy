<div class="form-group">
    <label for="level">Nivel</label>
    <input type="text" name="name" class="form-control @error('name') is-invalid @else '' @enderror" id="level"
        value="{{ old('name', $level->name ?? '') }}" placeholder="Nombre del nivel">
    @error('name')
        <span class="invalid-feedback">
            {{ $message }}
        </span>
    @enderror
</div>
