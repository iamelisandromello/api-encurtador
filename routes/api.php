<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get("urls/{url}", "UrlsController@link");                       //GET /urls/:id
Route::post("users/{userid}/urls", "UrlsController@addUrl");           //POST /users/:userid/urls
Route::get("stats", "UrlsController@index");                           //GET /stats
Route::get("users/{userId}/stats", "UrlsController@statsByUser");      //GET /users/:userId/stats
Route::get("stats/{url}", "UrlsController@url");                       //GET /stats/:id
Route::delete("urls/{url}", "UrlsController@destroy");                 //DELETE /urls/:id
Route::post("users", "UsersController@addUser");                       //POST /users
Route::delete("user/{userId}", "UsersController@destroy");             //DELETE /user/:userId

