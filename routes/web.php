<?php

use Illuminate\Support\Facades\Route;
use App\Models\Cliente;

Route::get('/', function () {
    return [
        'Clientes' => Cliente::with('cidade')->get(),
];
});

require __DIR__.'/auth.php';
