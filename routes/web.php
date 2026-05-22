<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

Route::get('/', [ContactController::class, 'index']);
Route::post('/confirm', [ContactController::class, 'confirm']);
Route::post('/store', [ContactController::class, 'store']);
Route::get('/thanks', [ContactController::class, 'thanks']);

