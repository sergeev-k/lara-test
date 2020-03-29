<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/users', 'UserController@index');

    Route::post('/invite', 'InviteController@process')->name('process');
    Route::get('accept/{token}', 'InviteController@accept')->name('accept');
});


Route::get('/{vue}', 'AppController@index')->where('vue', '.*')->name('home');
