<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StatsController extends Controller
{
    public function index() 
    {

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
            [
                "id"        => "23092",
                "hits"      => 115,
                "url"       => "http://www.example.com/contato",
                "shortUrl"  => "http://<host>[:<port>]/asdfeibc"
            ],     
        ];
    
        return $stats;

    }
}
