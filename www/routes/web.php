<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {

    Route::get('/', function () {
        return view('app.clientes.index');
    })->name('clientes.index');

    Route::get('/admin', function () {
        return view('app.admin.index');
    })->name('admin');

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
