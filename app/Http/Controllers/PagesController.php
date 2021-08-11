<?php

namespace App\Http\Controllers;

use Error;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use App\Services\RequestService;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return object
     */
    public function index(): object
    {
        $posts = RequestService::cachedGetRequest('https://jsonplaceholder.typicode.com/posts');
        return view('/posts', compact('posts'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return object
     */
    public function show(int $id): object
    {
        $post = RequestService::cachedGetRequest('https://jsonplaceholder.typicode.com/posts/' . $id, $id);
        return view('/post', compact('post'));
    }
}
