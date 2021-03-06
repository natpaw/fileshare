<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Post;


class PostTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_post_screen_can_be_rendered()
    {
		$post = Post::factory()->create();
        $response = $this->get('posts/'.$post->slug);
        $response->assertStatus(200);
    }
}
