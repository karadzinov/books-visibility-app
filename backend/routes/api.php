<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StackVisibilityController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/calculate', [StackVisibilityController::class, 'calculate']);
Route::get('/history', [StackVisibilityController::class, 'history']);
