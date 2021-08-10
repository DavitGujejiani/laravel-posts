<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Symfony\Component\VarDumper\VarDumper;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = cache()->remember('posts', 300, function () {
            $response = Http::get('https://jsonplaceholder.typicode.com/posts');

            if (!$response->ok()) {
                return response()->json([
                    'message' => 'Bad request',
                ], 400);
            }

            return json_decode($response->body());
        });

        return view('/posts', compact('posts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = cache()->remember("posts{$id}", 300, function () use ($id) {
            $response = Http::get("https://jsonplaceholder.typicode.com/posts/{$id}");

            if (!$response->ok()) {
                return response()->json([
                    'message' => 'Post not found',
                ], 404);
            }

            return json_decode($response->body());
        });

        return view('/post', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
