<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\LibroController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
//use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ModelHasRoleController;
use App\Http\Livewire\Nomaperitivos;
use App\Http\Livewire\Nomarroces;
use App\Http\Livewire\Nombebidas;
use App\Http\Livewire\Nomcarnes;
use App\Http\Livewire\Nomensaladas;
use App\Http\Livewire\Nominfusiones;
use App\Http\Livewire\Nompescadosmariscos;
use App\Http\Livewire\Nompostres;
use App\Http\Livewire\Roles;

//use App\Http\Controllers\RolesController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

/*Route::get('/empleado', function () {
    return view('empleado.index');
})->middleware('auth');
Route::get('/evento', 'EventoController@index')->middleware('auth');*/

//Route::get('/empleado/create', [EmpleadoController::class, 'create'])->middleware('auth');

//Route::resource('empleado', EmpleadoController::class)->middleware('auth');
Route::resource('evento', EventoController::class)->middleware('auth');
Route::resource('clientes', ClienteController::class)->middleware('auth');
Route::resource('pedidos', PedidoController::class)->middleware('auth');
Route::resource('libros', LibroController::class)->middleware('auth');
Route::resource('user', UserController::class)->middleware('auth');
//Route::resource('role', RoleController::class)->middleware('auth');
Route::resource('model-has-role', ModelHasRoleController::class)->middleware('auth');
//Route::resource('roles', RolesController::class)->middleware('auth');

//Route::resource('admin', HomeController::class)->middleware('auth');

Route::get('/home', [EmpleadoController::class, 'index'])->name('home')->middleware('auth');

Auth::routes(['register' => false, 'reset' => false, 'verify' => false]);
//Auth::routes(['register' => false, 'reset' => false]);

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [EmpleadoController::class, 'index'])->name('home');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    //Route Hooks - Do no Delete//
    Route::resource('roles', Roles::class)->middleware('auth');
    Route::resource('nomaperitivos', Nomaperitivos::class)->middleware('auth');
    Route::resource('nomarroces', Nomarroces::class)->middleware('auth');
    Route::resource('nombebidas', Nombebidas::class)->middleware('auth');
    Route::resource('nomcarnes', Nomcarnes::class)->middleware('auth');
    Route::resource('nomensaladas', Nomensaladas::class)->middleware('auth');
    Route::resource('nominfusiones', Nominfusiones::class)->middleware('auth');
    Route::resource('nompescadosmariscos', Nompescadosmariscos::class)->middleware('auth');
    Route::resource('nompostres', Nompostres::class)->middleware('auth');

});





//Route::view('roles','livewire.roles.index')->middleware('auth');



