<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use App\Models\Url;

class UrlsController extends Controller
{
    public function link(Url $url) 
    {
        $url->increment('hit');
/*         return redirect($url['url'], 301, [], null); */
        Cache::remember($url['url'], function () {
            return redirect($url['url'], 301, [], null);
        });
    }
    
    public function addUrl( $user_id, Request $request )
    {
        try
        {
            $hit = 0;
            $url = Url::create([
                'hit'       => $hit,
                'url'       => $request->input('url'),
                'user_id'   => $user_id
            ]);

            $urlReturn = $this->mountResponse($url);
            return response()->json($urlReturn, 201);

        } catch (\Throwable $th) {
            return response()->json([
                'User not found'        => '404 Not Found'
            ], 404);
        }
    }
  
    public function index() 
    {
        $recoveredUrls = Url::all();
        $urls = $this->mountResponseCollection($recoveredUrls);
        return response()->json($urls, 200);
    }

    public function statsByUser( $user_id )
    {
        $statsUser = Url::where('user_id', '=', $user_id)->get();
        
        if(count($statsUser) < 1)
        {
            return response()->json([
                'User not found'        => '404 Not Found'
            ], 404);
        }

        $users = $this->mountResponseCollection($statsUser);

        return response()->json($users, 200);
    }

    public function url(Url $url) 
    {
        $recoveredUrl = Url::findOrFail($url['id']);

        $urlReturn = $this->mountResponse($recoveredUrl);
        return response()->json($urlReturn, 200);
    }

    public function destroy(Url $url)
    {
        $url->delete();
        return response()->json([]);
    }

    public function stats( $user_id, Request $request )
    {
        return Url::find($id);
    }

    private function mountResponseCollection($collection)
    {
        $element = [];
        $count = 0;
        foreach ($collection as $item)
        {
            $element[$count]['id']        = $item['id'];
            $element[$count]['hits']      = $item['hit'];
            $element[$count]['item']      = $item['url'];
            $element[$count]['shortUrl']  = $this->mountUrl($item['short_url']);
            $count++;
        }
        return $element;
    }

    private function mountResponse($element)
    {
        return [
            'hits'      => $element['hit'],
            'id'        => $element['id'],
            'shortUrl'  => $this->mountUrl($element['short_url']),
            'url'       => $element['url']
        ];
    }

    private function mountUrl($sufix)
    {
        return env('APP_URL') . ':' . env('APP_PORT') . '/'. $sufix;
    }
}