<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;

use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class UserController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            // Requerir autenticación para todo el controlador
            'auth',

            // Permiso para Ver la lista (index) y ver el detalle (show)
            new Middleware('can:Leer usuarios', only: ['index']),

            // Permiso para Ver el formulario de edición y Actualizar el rol
            new Middleware('can:Editar usuarios', only: ['edit', 'update']),
        ];
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.users.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $roles = Role::all();
        return view('admin.users.edit', compact('user', 'roles'));
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'roles' => 'required'
        ]);

        $user->roles()->sync($request->roles);

        return redirect()->route('admin.users.edit', $user)->with('success','Los roles se han asignado correctamente');
    }
}
