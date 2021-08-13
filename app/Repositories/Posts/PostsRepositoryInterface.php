<?php

namespace App\Repositories\Posts;

interface PostsRepositoryInterface
{
    public function get(string $url);

    public function find(string $url, int $id);
}
