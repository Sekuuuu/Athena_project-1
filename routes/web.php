<?php

use App\Http\Controllers\authcontroller;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\postController;
use App\Http\Controllers\profileController;
use App\Models\Listing;
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
Route::get('/', function () {
    return view('login');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register');
});

Route::post('/register-user', [authcontroller::class, 'registerUser'])->name('register-user');
Route::post('/login-user', [AuthController::class, 'loginUser'])->name('login-user');
Route::get('/logout', [authController::class, 'logout']);

Route::get('auth/google', [GoogleController::class, 'googlepage']);
Route::get('auth/google/callback', [GoogleController::class, 'googlecallback']);


Route::get('/dashboard', [authcontroller::class, 'Userdashboard']);
Route::get('/createPost', [postController::class, 'posts']);
Route::post('/create-post', [postController::class, 'create_post'])->name('create-post');

Route::get('/profile', [profileController::class, 'profile']);

Route::get('/search', [postController::class, 'searchPost'])->name('search');