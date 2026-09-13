<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Level;

class LevelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $levels = Level::paginate();
        return view('admin.levels.index', compact('levels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.levels.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:5|max:255|unique:levels,name',
        ]);

        $level = Level::create($request->all());

        return redirect()->route('admin.levels.edit', $level)->with('success', 'Nivel creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Level $level)
    {
        return view('admin.levels.show', compact('level'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Level $level)
    {
        return view('admin.levels.edit', compact('level'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Level $level)
    {
        $request->validate([
            'name' => 'required|min:5|max:255|unique:levels,name,' . $level->id,
        ]);

        $level->update($request->all());

        return redirect()->route('admin.levels.edit', $level)->with('success', 'Nivel actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Level $level)
    {
        if ($level->courses()->count()) {
            return redirect()->route('admin.levels.index')->with('error', 'No se puede eliminar el nivel porque tiene cursos asociados');
        }

        $level->delete();

        return redirect()->route('admin.levels.index')->with('success', 'Nivel eliminado correctamente');
    }
}
