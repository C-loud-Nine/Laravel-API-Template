<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageUploadController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/api', function () {
    return 'hoga';
});



Route::get('/upload', [ImageUploadController::class, 'index']);
Route::post('/predict', [ImageUploadController::class, 'uploadAndPredict']);



