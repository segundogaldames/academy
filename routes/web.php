<?php

use App\Http\Controllers\CourseController;
use Illuminate\Support\Facades\Route;
use App\Livewire\CourseStatus;

Route::get('/', App\Http\Controllers\HomeController::class)->name('home');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/cursos', [CourseController::class,'index'])->name('courses.index');

Route::get('/cursos/{course}', [CourseController::class,'show'])->name('courses.show');

Route::post('/courses/{course}/enrolled', [CourseController::class,'enrolled'])->middleware('auth')->name('courses.enrolled');

Route::get('/course-status/{course}', CourseStatus::class)->name('courses.status')->middleware('auth');