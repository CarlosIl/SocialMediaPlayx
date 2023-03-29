<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\AuthController;

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
    return view('welcome');
});

//Para página registro
Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/register', [AuthController::class, 'register']);

//Para página login
Route::get('/login', [AuthController::class, 'showLogin']);
//Poner name para arreglar error de redirección login
Route::post('/login', [AuthController::class, 'login'])->name('login');

//Desloguearse
Route::get('/logout', [AuthController::class, 'logout']);

//Vista usuario normal
Route::middleware(['auth','user-access:user'])->group(function(){
    Route::get('/verstu', function () {
        return view('welcome');
    });
});

//Vista administrador
Route::middleware(['auth','user-access:admin'])->group(function(){
    Route::get('/students', function () {
        return view('welcome');
    });
});