<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Http\Requests\ShortenerRequest;
use App\Services\URL\URLShortenerService;

class ShortenerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(URLShortenerService $urlShortener)
    {
        $urlList = $urlShortener->getAll();
        return new Response(json_encode($urlList), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ShortenerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ShortenerRequest $request, URLShortenerService $urlShortener)
    {
        $setUrl = $urlShortener->setUrl($request->input('url'));
        
        if ($setUrl) {
            return new Response(json_encode(['success' => '1']), 201);
        }
      
        return new Response(json_encode(['success' => '0']), 400);
    }
}
