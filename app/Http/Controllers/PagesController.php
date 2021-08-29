<?php

namespace App\Http\Controllers;

use App\Repositories\Posts\PostsRepositoryInterface;
use Exception;
use Illuminate\View\View;

class PagesController extends Controller
{
    public function index(PostsRepositoryInterface $postsRepo): View
    {
        try {
            $posts = $postsRepo->get('https://jsonplaceholder.typicode.com/posts');
        } catch (Exception $exception) {
            abort($exception->getMessage());
        }

        return view('/posts', compact('posts'));
    }

    public function show(PostsRepositoryInterface $postsRepo, int $id): View
    {
        try {
            $post = $postsRepo->find('https://jsonplaceholder.typicode.com/posts/', $id);
        } catch (Exception $exception) {
            abort($exception->getMessage());
        }

        return view('/post', compact('post'));
    }
}
