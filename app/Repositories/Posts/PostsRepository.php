<?php

namespace App\Repositories\Posts;

use Exception;
use Illuminate\Support\Facades\Http;

class PostsRepository implements PostsRepositoryInterface
{
    /**
     * @param string $url
     * @return object
     * @throws Exception
     */
    public function get(string $url): object
    {
        $response = Http::get($url);

        if ($response->failed()) {
            throw new Exception($response->status());
        }

        return (object)$response->object();
    }

    /**
     * @param string $url
     * @param int $id
     * @return object
     * @throws Exception
     */
    public function find(string $url, int $id): object
    {
        $response = Http::get($url . $id);

        if ($response->failed()) {
            throw new Exception($response->status());
        }

        return (object)$response->object();
    }
}
