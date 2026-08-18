<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

use App\Models\Course;
use App\Models\Category;
use App\Models\Level;
use App\Models\Price;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Gate;

use Spatie\Permission\Models\Permission;

class CourseController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            // Requerir autenticación para el controlador
            'auth',

            // Permiso para Ver la lista (index) y ver el detalle (show)
            new Middleware('can:Leer cursos', only: ['index', 'show']),

            // Permiso para Ver el formulario de creación y Guardar el nuevo rol
            new Middleware('can:Crear cursos', only: ['create', 'store']),

            // Permiso para Ver el formulario de edición y Actualizar el rol
            new Middleware('can:Actualizar cursos', only: ['edit', 'update', 'goals']),

            // Permiso para Eliminar el rol
            new Middleware('can:Eliminar cursos', only: ['destroy']),
        ];
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('instructor.courses.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::select('id', 'name')->orderBy('name')->get();
        $levels = Level::select('id', 'name')->orderBy('name')->get();
        $prices = Price::select('id', 'name', 'price')->get();

        return view('instructor.courses.create', compact('categories', 'levels', 'prices'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:10|max:255|unique:courses',
            'subtitle' => 'required|min:10|max:255',
            'slug' => 'required',
            'description' => 'required|min:10|max:255',
            'category' => 'required|numeric',
            'level' => 'required|numeric',
            'price' => 'required|numeric',
            'file' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048'
        ]);

        $course = Course::create([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'description' => $request->description,
            'status' => 1,
            'slug' => $request->slug,
            'category_id' => $request->category,
            'level_id' => $request->level,
            'price_id' => $request->price,
            'user_id' => Auth::user()->id,
        ]);



        if ($request->hasFile('file')) {

            $path = $request->file('file')->store('courses', 'public');

            // 3. Retornará la ruta guardada, por ejemplo: "courses/prueba/a1b2c3d4.jpg"
            $course->image()->create(
                [
                    'url' => $path
                ]
            );
        }

        // 2. Guardar usando el método store() del propio archivo (La forma más segura)
        // Esto guardará en: storage/app/public/courses/prueba/

        return redirect()->route('instructor.courses.edit', $course)->with('success', 'El curso se ha creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        return view('instructor.courses.show', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        Gate::authorize('dictated', $course);

        $categories = Category::select('id', 'name')->orderBy('name')->get();
        $levels = Level::select('id', 'name')->orderBy('name')->get();
        $prices = Price::select('id', 'name', 'price')->get();

        return view('instructor.courses.edit', compact('course', 'categories', 'levels', 'prices'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        $request->validate([
            'title' => 'required|min:10|max:255|unique:courses,title,' . $course->id,
            'subtitle' => 'required|min:10|max:255',
            'slug' => 'required',
            'description' => 'required|min:10|max:255',
            'category' => 'required|numeric',
            'level' => 'required|numeric',
            'price' => 'required|numeric',
            'file' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048'
        ]);

        $course->update([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'description' => $request->description,
            'status' => 1,
            'slug' => $request->slug,
            'category_id' => $request->category,
            'level_id' => $request->level,
            'price_id' => $request->price,
            'user_id' => Auth::user()->id,
        ]);

        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('courses', 'public');

            if ($course->image) {
                Storage::disk('public')->delete($course->image->url);
                $course->image()->update(
                    [
                        'url' => $path
                    ]
                );
            } else {
                $course->image()->create(
                    [
                        'url' => $path
                    ]
                );
            }
        }

        // 2. Guardar usando el método store() del propio archivo (La forma más segura)
        // Esto guardará en: storage/app/public/courses/prueba/

        // 3. Retornará la ruta guardada, por ejemplo: "courses/prueba/a1b2c3d4.jpg"

        return redirect()->route('instructor.courses.edit', $course)->with('success', 'El curso se ha modificado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        //
    }

    public function goals(Course $course)
    {
        Gate::authorize('dictated', $course);
        return view('instructor.courses.goals', compact('course'));
    }
}
