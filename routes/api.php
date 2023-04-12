<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\GradebooksController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\UsersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');
Route::post('/gradebooks', [GradebooksController::class, 'store'])->middleware('auth');
Route::post('/students', [StudentsController::class, 'store'])->middleware('auth');

Route::get('/gradebooks', [GradebooksController::class, 'index'])->middleware('auth');
Route::get('/gradebooks/{id}', [GradebooksController::class, 'show'])->middleware('auth');
Route::get('/teachers/all', [UsersController::class, 'teachersNoPaginate'])->middleware('auth');
Route::get('/teachers', [UsersController::class, 'index'])->middleware('auth');
Route::get('/teachers/{id}', [UsersController::class, 'show'])->middleware('auth');
Route::get('/me', [UsersController::class, 'me'])->middleware('auth');

Route::put('/gradebooks/{id}', [GradebooksController::class, 'update'])->middleware('auth');

Route::delete('/gradebooks/{id}', [GradebooksController::class, 'destroy'])->middleware('auth');
