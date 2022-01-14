<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\EnderecoController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {

    Route::get('/', function () {
        return redirect()->route('clientes.index');
    })->name('index');

    Route::get('/clientes', [ClienteController::class, 'index'])
        ->name('clientes.index');

    Route::get('/clientes/create', [ClienteController::class, 'create'])
        ->name('clientes.create');

    Route::post('/clientes/store', [ClienteController::class, 'store'])
        ->name('clientes.store');

    Route::get('/clientes/edit/{id}', [ClienteController::class, 'edit'])
        ->name('clientes.edit');

    Route::put('/clientes/update/{id}', [ClienteController::class, 'update'])
        ->name('clientes.update');

    Route::delete('/clientes/delete/{id}', [ClienteController::class, 'destroy'])
        ->name('clientes.destroy');

     Route::get('/enderecos/show/{id}', [EnderecoController::class, 'show'])
        ->name('endereco.show');

    Route::delete('/enderecos/delete/{id}', [EnderecoController::class, 'destroy'])
        ->name('endereco.destroy');


    Route::get('/admin', function () {
        return view('app.admin.index');
    })->name('admin');

});

Auth::routes();
