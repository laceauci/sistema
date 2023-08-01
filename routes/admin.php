<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\EmpleadoController;






//Route::get('admin', [HomeController::class, 'index'])->middleware('auth');

Route::resource('admin', HomeController::class)->names('admin')->middleware('auth');
Route::resource('empleado', EmpleadoController::class)->names('admin.empleado')->middleware('auth');
Route::resource('users', UserController::class)->names('admin.users')->middleware('auth');
//Route::view('roles','livewire.roles.index')->middleware('auth');



