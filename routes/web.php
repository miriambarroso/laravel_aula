<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AgenciaController;
use App\Http\Controllers\BancoController;
use App\Http\Controllers\ProvisionServer;

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
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::post('/server',ProvisionServer::class);

Route::get('/agencia/destroy/{id}', [AgenciaController::class, 'destroy'])->middleware(['auth', 'admin'])->name('agencia.destroy');
Route::get('/agencia/index', [AgenciaController::class, 'index'])->middleware(['auth'])->name('agencia.index');
Route::post('/agencia/store',  [AgenciaController::class, 'store'])->middleware(['auth', 'logged'])->name('agencia.store');
Route::put('/agencia/{id}', [AgenciaController::class, 'update'])->middleware(['auth', 'logged'])->name('agencia.update');
Route::get('/agencia/edit/{id}', [AgenciaController::class, 'edit'])->middleware(['auth', 'logged'])->name('agencia.update');
Route::get('/agencia/create', [AgenciaController::class, 'create'])->middleware(['auth', 'logged'])->name('agencia.create');
Route::get('/agencia/{id}', [AgenciaController::class, 'show'])->middleware(['auth'])->name('agencia.show');

Route::get('/banco/index', [BancoController::class, 'index'])->middleware(['auth', 'logged'])->name('banco.index');
Route::get('/banco/destroy/{id}', [BancoController::class, 'destroy'])->middleware(['auth', 'admin'])->name('banco.destroy');
Route::get('/banco/create', [BancoController::class, 'create'])->middleware(['auth', 'logged'])->name('banco.create');
Route::post('/banco/store',  [BancoController::class, 'store'])->middleware(['auth', 'logged'])->name('banco.store');
Route::put('/banco/update/{id}', [BancoController::class, 'update'])->middleware(['auth', 'logged'])->name('banco.update');
Route::get('/banco/{id}', [BancoController::class, 'show'])->middleware(['auth', 'logged'])->name('banco.show');
Route::get('/banco/edit/{id}', [BancoController::class, 'edit'])->middleware(['auth', 'logged'])->name('banco.show');

Route::get('/user/create', [UserController::class, 'create'])->middleware(['auth', 'admin'])->name('user.create');
Route::get('/user/index', [UserController::class, 'index'])->middleware(['auth', 'admin'])->name('user.index');
Route::get('/user/{id}', [UserController::class, 'show'])->middleware(['auth', 'logged'])->name('user.show');
Route::get('/user/edit/{id}', [UserController::class, 'edit'])->middleware(['auth', 'admin'])->name('user.edit');
Route::post('/user', [UserController::class, 'store'])->middleware(['auth', 'admin'])->name('user.store');
Route::get('/user/destroy/{id}', [UserController::class, 'destroy'])->middleware(['auth', 'logged'])->name('user.destroy');
Route::get('/profile', [UserController::class, 'show'])->middleware(['auth'])->name('user.profile');
Route::post('/profile/update/{id}', [UserController::class, 'update'])->middleware(['user'])->name('user.update');


Route::get('/', function () {
    return view('dashboard');
})->middleware('auth', 'user')->name('dashboard');

require __DIR__.'/auth.php';
