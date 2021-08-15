<?php

namespace App\Repositories\Posts;

use Illuminate\Cache\CacheManager;

class PostsCacheRepository implements PostsRepositoryInterface
{
    protected $repo;
    protected $cache;
    const TTL = 300;

    /**
     * @param CacheManager $cache
     * @param PostsRepository $repo
     */
    public function __construct(CacheManager $cache, PostsRepository $repo)
    {
        $this->repo = $repo;
        $this->cache = $cache;
    }

    /**
     * @param string $url
     * @return object
     */
    public function get(string $url): object
    {
        return $this->cache->remember('posts', self::TTL, function () use ($url) {
            return $this->repo->get($url);
        });
    }

    /**
     * @param string $url
     * @param int $id
     * @return object
     */
    public function find(string $url, int $id): object
    {
        return $this->cache->remember('posts' . $id, self::TTL, function () use ($url, $id) {
            return $this->repo->get($url . $id);
        });
    }
}
