<div class="form-group">
    <label for="role">Role</label>
    <input type="text" name="name" class="form-control @error('name') is-invalid @else '' @enderror" id="role"
        value="{{ old('name', $role->name ?? '') }}" placeholder="Rol de usuario">
    @error('name')
        <span class="invalid-feedback">
            {{ $message }}
        </span>
    @enderror
</div>
<div class="form-group">
    <strong>Permisos</strong>
    @error('permissions')
        <p class="text-danger">
            {{ $message }}
        </p>
    @enderror
    @foreach ($permissions as $permission)
        <div>
            <label for="permission">
                <input type="checkbox" name="permissions[]" value="{{ $permission->id }}"
                    {{ (is_array(old('permissions')) && in_array($permission->id, old('permissions'))) || (!old('permissions') && isset($role) && $role->hasPermissionTo($permission->name)) ? 'checked' : '' }}
                    id="permission" class="mr-1">
                {{ $permission->name }}
            </label>
        </div>
    @endforeach

</div>
