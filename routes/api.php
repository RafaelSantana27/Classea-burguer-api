<?php

use App\Http\Controllers\CategoriaController;
use App\Services\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/status', function() {
    return ApiResponse::sucesso('API está funcionando');
});

Route::apiResource('categorias', CategoriaController::class);