<?php

namespace App\Http\Controllers;

use App\Repositories\Posts\PostsRepositoryInterface;
use Exception;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param PostsRepositoryInterface $postsRepo
     * @return object
     */
    public function index(PostsRepositoryInterface $postsRepo): object
    {
        try {
            $posts = $postsRepo->get('https://jsonplaceholder.typicode.com/posts');
        } catch (Exception $exception) {
            abort($exception->getMessage());
        }

        return view('/posts', compact('posts'));
    }

    /**
     * Display the specified resource.
     *
     * @param PostsRepositoryInterface $postsRepo
     * @param int $id
     * @return object
     */
    public function show(PostsRepositoryInterface $postsRepo, int $id): object
    {
        try {
            $post = $postsRepo->find('https://jsonplaceholder.typicode.com/posts/', $id);
        } catch (Exception $exception) {
            abort($exception->getMessage());
        }

        return view('/post', compact('post'));
    }
}
