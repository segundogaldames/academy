<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Gate;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('courses.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        Gate::authorize('published', $course);
        $similares = Course::where('category_id', $course->category_id)->where('id','!=', $course->id)->where('status',3)->latest('id')->take(5)->get();
        return view('courses.show', compact('course','similares'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        //
    }

    public function enrolled(Course $course)
    {
        $course->students()->attach(Auth::user()->id);
        return redirect()->route('courses.status', $course);
    }

    public function status(Course $course)
    {
        return view('courses.status', compact('course'));
    }
}
