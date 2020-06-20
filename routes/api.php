<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/* Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
}); */

Route::get("urls", "UrlsController@index");
Route::post("urls", "UrlsController@store");
Route::post("users", "UsersController@addUser");