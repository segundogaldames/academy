<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller implements HasMiddleware
{
    /**
     * Definir los middlewares que protegen las rutas resource.
     */
    public static function middleware(): array
    {
        return [
            // Requerir autenticación para todo el controlador
            'auth',

            // Permiso para Ver la lista (index) y ver el detalle (show)
            new Middleware('can:Leer roles', only: ['index', 'show']),

            // Permiso para Ver el formulario de creación y Guardar el nuevo rol
            new Middleware('can:Crear roles', only: ['create', 'store']),

            // Permiso para Ver el formulario de edición y Actualizar el rol
            new Middleware('can:Editar roles', only: ['edit', 'update']),

            // Permiso para Eliminar el rol
            new Middleware('can:Eliminar roles', only: ['destroy']),
        ];
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::all();
        return view('admin.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = Permission::all();
        return view('admin.roles.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'permissions' => 'required'
        ]);

        $role = Role::create([
            'name' => $request->name
        ]);

        $role->permissions()->attach($request->permissions);

        return redirect()->route('admin.roles.index')->with('success','El rol se ha registrado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        return view('admin.roles.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        $permissions = Permission::all();
        return view('admin.roles.edit', compact('role','permissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required',
            'permissions' => 'required'
        ]);

        $role->update([
            'name' => $request->name
        ]);

        $role->permissions()->sync($request->permissions);
        return redirect()->route('admin.roles.edit', $role)->with('success','El rol y los permisos se actualizaron correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        $role->delete();

        return redirect()->route('admin.roles.index')->with('success','El rol se ha eliminado correctamente');
    }
}
