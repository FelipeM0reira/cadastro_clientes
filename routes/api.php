<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\CidadeController;
use App\Http\Controllers\RepresentanteController;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('clientes', ClienteController::class);
Route::apiResource('cidades', CidadeController::class);
Route::apiResource('representantes', RepresentanteController::class);
