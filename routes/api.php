<?php

use App\Http\Controllers\AdicionalController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProdutoController;
use Illuminate\Support\Facades\Route;
use Laravel\Sanctum\Sanctum;

// Route::get('/status', function() {
//     return ApiResponse::sucesso('API está funcionando');
// })->middleware('auth:sanctum');

// Categoria
Route::apiResource('categorias', CategoriaController::class);
// ->middleware('auth:sanctum');

// Adicional
Route::apiResource('adicionais', AdicionalController::class);

// Produtos
Route::apiResource('produtos', ProdutoController::class);

// auth routes
Route::post('/login', [AuthController::class, 'login']);