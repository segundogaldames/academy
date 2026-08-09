<?php

use Illuminate\Support\Facades\Route;

Route::get('', [App\Http\Controllers\Admin\HomeController::class, 'index'])->middleware('can:Ver dashboard')->name('home');
Route::resource('roles', App\Http\Controllers\Admin\RoleController::class)->names('roles');
Route::resource('users', App\Http\Controllers\Admin\UserController::class)->only('index','edit','update')->names('users');



