<?php

namespace App\Http\Controllers;

use Error;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return object
     */
    public function index(): object
    {
        $posts = cache()->remember('posts', 300, function () {
            return Http::get('https://jsonplaceholder.typicode.com/posts')->object();
        });

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
        $post = Cache::remember('posts' . $id, 300, function () use ($id) {
            $response = Http::get('https://jsonplaceholder.typicode.com/posts/' . $id);

            if ($response->failed()) {
                abort(404);
            }

            return $response->object();
        });

        return view('/post', compact('post'));
    }
}
