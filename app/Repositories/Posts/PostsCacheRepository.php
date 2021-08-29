<?php

namespace App\Repositories\Posts;

use Illuminate\Cache\CacheManager;

class PostsCacheRepository implements PostsRepositoryInterface
{
    protected PostsRepository $repo;
    protected CacheManager $cache;
    protected const TTL = 300;

    public function __construct(CacheManager $cache, PostsRepository $repo)
    {
        $this->repo = $repo;
        $this->cache = $cache;
    }

    public function get(string $url): object
    {
        return $this->cache->remember('posts', self::TTL, function () use ($url) {
            return $this->repo->get($url);
        });
    }

    public function find(string $url, int $id): object
    {
        return $this->cache->remember('posts' . $id, self::TTL, function () use ($url, $id) {
            return $this->repo->get($url . $id);
        });
    }
}
