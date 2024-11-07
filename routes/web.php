<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageUploadController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/api', function () {
    return 'hoga';
});



Route::get('/upload', [ImageUploadController::class, 'index']);
Route::post('/predict', [ImageUploadController::class, 'uploadAndPredict']);



Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/registerUser', [AuthController::class, 'register'])->name('registerUser');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/loginUser', [AuthController::class, 'login'])->name('loginUser');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/dashboard', [AuthController::class, 'index'])->name('dashboard')->middleware('auth');