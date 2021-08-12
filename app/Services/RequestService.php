<?php

namespace App\Services;

use Exception;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class RequestService
{
    /**
     * Returns and caches resource from specified api url for 5 minutes
     *
     * @param string $url
     * @param ?int $id
     * @return object
     */
    public static function cachedGetRequest(string $url, ?int $id = null): object
    {
        return Cache::remember('posts' . $id, 1, function () use ($url, $id) {
            $response = Http::get($url . $id);

            if ($response->failed()) {
                throw new Exception($response->status());
            }

            return (object)$response->object();
        });
    }
}
