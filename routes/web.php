<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::get('/{vue}', 'AppController@index')->where('vue', '.*')->name('home');
