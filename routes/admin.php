<?php

use App\Http\Controllers\Admin\CourseController;
use Illuminate\Support\Facades\Route;

Route::get('', [App\Http\Controllers\Admin\HomeController::class, 'index'])->middleware('can:Ver dashboard')->name('home');
Route::resource('roles', App\Http\Controllers\Admin\RoleController::class)->names('roles');
Route::resource('users', App\Http\Controllers\Admin\UserController::class)->only('index', 'edit', 'update')->names('users');
Route::get('courses', [CourseController::class, 'index'])->name('courses.index');
Route::get('courses/{course}', [CourseController::class, 'show'])->name('courses.show');
Route::post('courses/{course}/approved', [CourseController::class, 'approved'])->name('courses.approved');
