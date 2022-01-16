<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\EnderecoController;
use App\Http\Middleware\PermissaoAdmin;
use App\Http\Middleware\PermissaoEditor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {

    // Perfil VISUALIZADOR
    Route::get('/', function () {
        return redirect()->route('clientes.index');
    })->name('index');

    Route::get('/clientes', [ClienteController::class, 'index'])->name('clientes.index');

    Route::get('/cliente/enderecos/{cliente_id}', [EnderecoController::class, 'index'])->name('endereco.index');
    Route::get('/cliente/enderecos/show/{id}', [EnderecoController::class, 'show'])->name('endereco.show');


    // Perfil EDITOR
    Route::middleware(PermissaoEditor::class)->group(function(){
        // /clientes
        Route::get('/clientes/create', [ClienteController::class, 'create'])->name('clientes.create');
        Route::post('/clientes/store', [ClienteController::class, 'store'])->name('clientes.store');
        Route::get('/clientes/edit/{id}', [ClienteController::class, 'edit'])->name('clientes.edit');
        Route::put('/clientes/update/{id}', [ClienteController::class, 'update'])->name('clientes.update');
        Route::delete('/clientes/delete/{id}', [ClienteController::class, 'destroy'])->name('clientes.destroy');

        // /cliente/enderecos
        Route::delete('/cliente/enderecos/delete/{id}', [EnderecoController::class, 'destroy'])->name('endereco.destroy');
        Route::get('/cliente/enderecos/edit/{id}', [EnderecoController::class, 'edit'])->name('endereco.edit');
        Route::put('/cliente/enderecos/update/{id}', [EnderecoController::class, 'update'])->name('endereco.update');
    });
        // Perfil ADMIN
        Route::middleware(PermissaoAdmin::class)->group(function () {
            Route::get('/admin/create',[AdminController::class, 'create'])->name('admin.create');
            Route::post('/admin/store',[AdminController::class, 'store'])->name('admin.store');
            Route::get('/admin',[AdminController::class, 'index'])->name('admin');
            Route::get('/admin/user/edit/{id}',[ AdminController::class, 'edit'])->name('admin.edit');
            Route::put('/admin/user/update/{id}',[ AdminController::class, 'update'])->name('admin.update');
            Route::delete('/admin/user/delete/{id}',[ AdminController::class, 'destroy'])->name('admin.destroy');
        });

});

Auth::routes();
