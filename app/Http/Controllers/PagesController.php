<?php

namespace App\Http\Controllers;

use App\Services\RequestService;
use Exception;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param RequestService $service
     * @return object
     */
    public function index(RequestService $service): object
    {
        $posts = $service->cachedGetRequest('https://jsonplaceholder.typicode.com/posts');

        return view('/posts', compact('posts'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return object
     */
    public function show(int $id): object
    {
        try {
            $post = RequestService::cachedGetRequest('https://jsonplaceholder.typicode.com/posts/', $id);
        } catch (Exception $ex) {
            abort($ex->getMessage());
        }

        return view('/post', compact('post'));
    }
}
