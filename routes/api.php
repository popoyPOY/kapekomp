<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ReviewController;




Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



Route::prefix('/user')->group(function() {
    Route::post('/login', [UserController::class, 'loginAccount']);
    Route::post('/logout', [UserController::class, 'logoutAccount'])->middleware(['auth:sanctum']);

    Route::get('/profile', [ProfileController::class, 'index'])->middleware(['auth:sanctum']);
    Route::post('/profile', [ProfileController::class, 'store'])->middleware(['auth:sanctum']);
});

Route::prefix('/shop')->group(function() {
    Route::get('', [ShopController::class, 'index']);
    Route::post('', [ShopController::class, 'store']);
    Route::get('/{id}', [ShopController::class, 'show']);

    Route::get('/{id}/review', [ShopController::class, 'review']);
    Route::post('/{id}/review', [ReviewController::class, 'store'])->middleware(['auth:sanctum']);
});
