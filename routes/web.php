<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EnvioController;
use App\Http\Controllers\CiudadController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\RepartidorController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('inicio');
});

Route::resource('/clientes', ClienteController::class);
Route::get('/clientes.restore', [ClienteController::class,'restore'])->name('clientes.restore'); /*.restore quiero usar un método*/
Route::get('/clientes.onlyTrashed', [ClienteController::class,'onlyTrashed'])->name('clientes.onlyTrashed');
Route::get('/clientes.pdf', [ClienteController::class,'createPDF'])->name('clientes.pdf');

Route::resource('/repartidores', RepartidorController::class);
Route::get('/repartidores.restore', [RepartidorController::class,'restore'])->name('repartidores.restore'); /*.restore quiero usar un método*/
Route::get('/repartidores.onlyTrashed', [RepartidorController::class,'onlyTrashed'])->name('repartidores.onlyTrashed');
Route::get('/repartidor_envios/{repartidor_id}', [RepartidorController::class, 'repartidorEnvios'])->name('repartidor_envios');
Route::get('/repartidores.pdf', [RepartidorController::class,'createPDF'])->name('repartidores.pdf');

Route::resource('/ciudades', CiudadController::class);
Route::get('/ciudades.restore', [CiudadController::class,'restore'])->name('ciudades.restore'); /*.restore quiero usar un método*/
Route::get('/ciudades.onlyTrashed', [CiudadController::class,'onlyTrashed'])->name('ciudades.onlyTrashed');
Route::get('/ciudades.pdf', [CiudadController::class,'createPDF'])->name('ciudades.pdf');

Route::resource('/envios', EnvioController::class);
Route::get('/envios.restore', [EnvioController::class,'restore'])->name('envios.restore'); /*.restore quiero usar un método*/
Route::get('/envios.onlyTrashed', [EnvioController::class,'onlyTrashed'])->name('envios.onlyTrashed');
Route::get('/envios.pdf', [EnvioController::class,'createPDF'])->name('envios.pdf');

Route::get('/email',[ContactoController::class, 'index'])->name('contacto.index');
Route::post('/email',[ContactoController::class, 'store'])->name('contacto.store');

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');
