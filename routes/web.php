<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminController;

Route::get('/', [ContactController::class, 'index']);
Route::post('/confirm', [ContactController::class, 'confirm']);
Route::post('/store', [ContactController::class, 'store']);
Route::get('/thanks', [ContactController::class, 'thanks']);

Route::middleware('auth')->group(function(){
    Route::get('/admin',[AdminController::class,'index']);
    Route::get('/search',[AdminController::class,'search']);
     Route::get('/reset', [AdminController::class, 'reset']);
    Route::post('/logout',[AdminController::class,'logout']);
    Route::delete('/delete/{id}',[AdminController::class,'destroy']);
     Route::get('/export', [AdminController::class, 'export']);
});

