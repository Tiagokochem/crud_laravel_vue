<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\DeveloperController;

// Routes for Levels
Route::prefix('levels')->group(function () {
    Route::get('/', [LevelController::class, 'index']);
    Route::post('/', [LevelController::class, 'store']);
    Route::get('/{id}', [LevelController::class, 'show']);
    Route::put('/{id}', [LevelController::class, 'update']);
    Route::delete('/{id}', [LevelController::class, 'destroy']);
});

// Routes for Developers
Route::prefix('developers')->group(function () {
    Route::get('/', [DeveloperController::class, 'index']);
    Route::post('/', [DeveloperController::class, 'store']);
    Route::get('/{id}', [DeveloperController::class, 'show']);
    Route::put('/{id}', [DeveloperController::class, 'update']);
    Route::delete('/{id}', [DeveloperController::class, 'destroy']);
});