<?php

namespace Tests\Feature;

use Tests\TestCase;

class PagesControllerTest extends TestCase
{
    public function test_index_page_can_be_rendered()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_post_page_can_be_rendered()
    {
        $response = $this->get('/posts/1');

        $response->assertStatus(200);
    }

    public function test_invalid_post_id_url_returns_404()
    {
        $response = $this->get('/posts/1000');

        $response->assertStatus(404);
    }
}
