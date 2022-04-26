<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AgenciaController;
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


Route::get('/', 'ItemController@show');
Route::post('/server', ProvisionServer::class);
Route::get('/user/{id}', [UserController::class, 'show']);
Route::get('profile', [UserController::class, 'show'])->middleware('auth');
Route::resources([
   'agencia', AgenciaController::class,
   'banco', BancoController::class,
]);