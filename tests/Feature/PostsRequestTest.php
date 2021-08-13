<?php

namespace Tests\Feature;

use App\Services\RequestService;
use Tests\TestCase;

class PostsRequestTest extends TestCase
{
    public function test_request_returns_list_of_products_as_an_object()
    {
        $posts = (new RequestService())->cachedGetRequest('https://jsonplaceholder.typicode.com/posts');
        $this->assertIsObject($posts);
    }

    public function test_single_post_request_returns_object_with_valid_attributes()
    {
        $post = (new RequestService())->cachedGetRequest('https://jsonplaceholder.typicode.com/posts/1');

        $this->assertObjectHasAttribute('id', $post);
        $this->assertObjectHasAttribute('title', $post);
        $this->assertObjectHasAttribute('body', $post);
    }

    public function test_abort_on_invalid_post_url()
    {
        $response = $this->get('/posts/1000');

        $response->assertStatus(404);
    }
}
