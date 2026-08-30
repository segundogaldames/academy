<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

use Illuminate\Support\Facades\Mail;
use App\Mail\ApprovedCourse;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::where('status', 2)->paginate();
        return view('admin.courses.index', compact('courses'));
    }

    public function show(Course $course)
    {
        Gate::authorize('revision', $course);
        return view('admin.courses.show', compact('course'));
    }

    public function approved(Course $course)
    {
        Gate::authorize('revision', $course);
        if (!$course->lessons || !$course->goals || !$course->requirements || !$course->image) {
            return back()->with('info', 'No se puede aprobar este curso. No está completo');
        }
        $course->status = 3;
        $course->save();

        //enviar correo de notificacion
        $mail = new ApprovedCourse($course);
        Mail::to($course->teacher->email)->send($mail);

        return redirect()->route('admin.courses.index')->with('info', 'El curso se ha aprobado satisfactoriamente');
    }
}
