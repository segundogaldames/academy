<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Price;

class PriceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prices = Price::paginate(10);
        return view('admin.prices.index', compact('prices'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.prices.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('prices')->where(function ($query) use ($request) {
                    return $query->where('price', $request->price);
                }),
            ],
            'price' => 'required|numeric|min:0',
        ]);
        $price = Price::create($request->all());
        return redirect()->route('admin.prices.edit', $price)->with('success', 'Precio creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Price $price)
    {
        return view('admin.prices.show', compact('price'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Price $price)
    {
        return view('admin.prices.edit', compact('price'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Price $price)
    {
        $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('prices') // reemplaza 'prices' por el nombre de tu tabla
                    ->where(function ($query) use ($request) {
                        return $query->where('price', $request->price);
                    })
                    ->ignore($price->id), // Usando el ID de la instancia
            ],
            'price' => 'required|numeric|min:0',
        ]);

        $price->update($request->all());
        return redirect()->route('admin.prices.edit', $price)->with('success', 'Precio actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Price $price)
    {
        if ($price->courses()->count() > 0) {
            return redirect()->route('admin.prices.index')->with('error', 'No se puede eliminar este precio porque está asociado a uno o más cursos.');
        }

        $price->delete();
        return redirect()->route('admin.prices.index')->with('success', 'Precio eliminado exitosamente.');
    }
}
