<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Comment;
use App\Models\User;
use App\Models\Post;

class CommentTest extends TestCase
{

	use RefreshDatabase;

	
    public function test_registered_user_can_comment()
	
    {
		$user = User::factory()->create();
		$post = Post::factory()->create();
		$view = $this->actingAs($user)->view('post', ['post' => $post]);
		$view->assertSee('submit');
        
    }
	public function test_comment_can_be_saved_and_rendered()
	
    {
		$user = User::factory()->create();
		$post = Post::factory()->create();
		$response = $this->actingAs($user)->post('/comment', [
			'post' => $post->id, 
			'comment' => 'kgam',
			]);
		$this->assertDatabaseHas('comments', [
			'body' => 'kgam',
		]);
		$view = $this->view('post', ['post' => $post]);
		$view->assertSee('kgam');
	}
	
	public function test_guest_cannot_comment()
	
    {
		$post = Post::factory()->create();
		$view = $this->view('post', ['post' => $post]);
		$view->assertDontSee('submit');
	}
}
