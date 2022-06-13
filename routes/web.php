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
    return view('welcome');
});

Route::get('/', [BancoController::class, 'index']);
Route::get('/banco/index', [BancoController::class, 'index'])->middleware('auth')->name('banco.index');
Route::get('/agencia/index', [AgenciaController::class, 'index']);
Route::post('/server',ProvisionServer::class);
Route::post('/banco/store',  [BancoController::class, 'store']);
Route::post('/agencia/store',  [AgenciaController::class, 'store']);
Route::get('/user/{id}', [UserController::class, 'show']);
Route::put('/user/{id}', [UserController::class, 'update']);
Route::put('/agencia/{id}', [AgenciaController::class, 'update']);
Route::put('/banco/{id}', [BancoController::class, 'update']);
Route::get('/banco/create', [BancoController::class, 'create'])->name('banco.create');
Route::get('/agencia/create', [AgenciaController::class, 'create']);
Route::get('/banco/{id}', [BancoController::class, 'show']);
Route::get('/agencia/{id}', [AgenciaController::class, 'show']);
Route::get('profile', [UserController::class, 'show'])->middleware('auth');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
