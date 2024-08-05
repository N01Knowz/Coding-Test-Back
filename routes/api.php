<?php

use App\Http\Controllers\PostsController;
use App\Http\Middleware\CheckAPIKey;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['auth:sanctum', CheckAPIKey::class])->apiResource('posts', PostsController::class);
