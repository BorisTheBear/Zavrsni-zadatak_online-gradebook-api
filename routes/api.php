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
Route::post('/logout', [AuthController::class, 'logout']);
Route::post('/gradebooks', [GradebooksController::class, 'store']);
Route::post('/JJJJJJJJJJJ', [StudentsController::class, 'store']);

Route::get('/gradebooks', [GradebooksController::class, 'index']);
Route::get('/gradebooks/{id}', [GradebooksController::class, 'show']);
Route::get('/teachers', [UsersController::class, 'index']);
Route::get('/teachers/{id}', [UsersController::class, 'show']);
