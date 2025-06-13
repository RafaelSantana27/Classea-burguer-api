<?php

use App\Http\Controllers\CategoriaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/status', function() {
    return response()->json(
        [
            'status' => 'ok',
            'message' => 'API está funcionando'
        ],
        200 
    );
});

Route::apiResource('categorias', CategoriaController::class);