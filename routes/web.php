<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\GestionController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MecanicoController;
use App\Http\Controllers\TallerController;
use Illuminate\Support\Facades\Route;

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
//rutas publicas

Route::get('/', [LoginController::class, 'index'])->name('login.index');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');

//rutas solo auteticados

Route::middleware('auth')->group(function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    //rutas administrador
    Route::middleware('role:administrador')->group(function () {
        Route::resource('admins', AdminController::class);
    });
    //rutas administrativo
    Route::middleware('role:administrativo')->group(function () {
        Route::resource('administrativos', GestionController::class);
        Route::resource('clientes', ClienteController::class);
    });
    //rutas mecanico
    Route::middleware('role:mecanico')->group(function () {

        Route::resource('mecanicos', MecanicoController::class);
        Route::get('tallers/hoja-trabajo/{id}', [TallerController::class, 'hojaTrabajo'])->name('tallers.hojaTrabajo');
        Route::resource('tallers', TallerController::class);
    });
    //

});
