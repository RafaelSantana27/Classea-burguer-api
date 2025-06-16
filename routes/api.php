<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProdutoController;
use App\Services\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/status', function() {
    return ApiResponse::sucesso('API está funcionando');
});

// Categoria
Route::apiResource('categorias', CategoriaController::class);

// Produtos
Route::apiResource('produtos', ProdutoController::class);