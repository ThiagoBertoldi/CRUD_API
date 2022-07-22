<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\UserController;

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

Route::get('/', [MainController::class, 'homePage'])->middleware('users.show');
Route::get('/new-user', [UserController::class, 'newUser']);
Route::post('/new-user', [UserController::class, 'createUser']);
Route::get('/edit-user', [UserController::class, 'editUser']);
Route::put('/edit-user', [UserController::class, 'validUser']);
Route::get('/show-user', [UserController::class, 'showUser']);
Route::delete('/delete-user', [UserController::class, 'deleteUser']);
