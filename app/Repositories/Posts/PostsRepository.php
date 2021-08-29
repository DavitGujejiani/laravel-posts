<?php

namespace App\Repositories\Posts;

use Exception;
use Illuminate\Support\Facades\Http;

class PostsRepository implements PostsRepositoryInterface
{
    public function get(string $url): object
    {
        $response = Http::get($url);

        if ($response->failed()) {
            throw new Exception($response->status());
        }

        return (object)$response->object();
    }

    public function find(string $url, int $id): object
    {
        $response = Http::get($url . $id);

        if ($response->failed()) {
            throw new Exception($response->status());
        }

        return (object)$response->object();
    }
}
