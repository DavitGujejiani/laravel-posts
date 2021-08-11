<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class RequestService
{
    /**
     * Returns and caches resource from specified api url for 5 minutes
     *
     * @param string $url
     * @param integer $id
     * @return object
     */
    public static function cachedGetRequest(string $url, int $id = null): object
    {
        $cacheName = $id ? 'posts' . $id : 'posts';

        $object = Cache::remember($cacheName, 300, function () use ($url) {
            $response = Http::get($url);

            if ($response->failed()) {
                abort(404);
            }
            
            return (object)$response->object();
        });

        return $object;
    }
}
