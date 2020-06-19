<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/* Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
}); */

Route::get("stats", function() {

    $stats = [
        [
            "id"        => "23094",
            "hits"      => 153,
            "url"       => "http://www.example.com/blog", 
            "shortUrl"  => "http://<host>[:<port>]/asdfeiba"
        ],
        [
            "id"        => "23090",
            "hits"      => 89,
            "url"       => "http://www.example.com/rss",
            "shortUrl"  => "http://<host>[:<port>]/asdfeibb"
        ],        
    ];

    return $stats;

});