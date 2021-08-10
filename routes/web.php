<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\User;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserAvatarController;
use App\Http\Controllers\PostController;

/*
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('main', [
		'user' => Auth::user(),
		'posts' => Post::latest()->get()
	]);
});

Route::get('posts/{post:slug}', function (Post $post) {
    return view('post', [
		'post' => $post
	]);
});

Route::get('posts/{post:slug}/download', function (Post $post) {
   return Storage::download($post->file);
});

Route::get('authors/{author:name}', function (User $author) {
    return view('main', [
		'posts' => $author->posts,
	]);
});

Route::post('/comment', [CommentController::class, 'store']);

Route::get('/dashboard', [DashboardController::class, 'profile']);

Route::post('/dashboard/upload', [UserAvatarController::class, 'update']);

Route::get('/addpost', function () {
    return view('addpost', [
			'user' => Auth::user(),
		]);
});

Route::post('/addpost/submit', [PostController::class, 'store']);

require __DIR__.'/auth.php';
