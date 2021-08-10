<?php

namespace Database\Seeders;


use App\Models\User;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::factory()->create([
			'name' => 'odmin'
		]);
		
		$users = User::factory(5)->create();
		
		$posts = Post::factory(5)->create([
			'user_id' => $admin->id
		]);
		
		foreach ($posts as $post){
			foreach ($users as $user){
				Comment::factory()->create([
					'user_id' => $user->id,
					'post_id' => $post->id
				]);	
			}
		}
	}
}
