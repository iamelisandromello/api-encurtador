<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Url;

class UrlsController extends Controller
{
    public function index() 
    {
        return Url::all();
    }

    public function store(Request $request) 
    {
        $url = Url::create([
            'hit'       => $request->input('hit'),
            'url'       => $request->input('url'),
            'short-url'  => $request->input('shortUrl')
        ]);

        return $url;
    }
}
