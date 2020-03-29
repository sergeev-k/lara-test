<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->prefix('v1')->namespace('Api\V1')->group(function () {
    Route::get('/projects', 'ProjectController@index');
    Route::get('/project/{id}', 'ProjectController@show');
});
