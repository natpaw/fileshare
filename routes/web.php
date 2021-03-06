<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
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
		'posts' => Post::latest()->paginate(3)
	]);
});

Route::get('/search/', 'PostController@search')->name('search');

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
		'posts' => $author->posts()->paginate(3),
	]);
});


Route::post('/comment', [CommentController::class, 'store'])->middleware('auth');

Route::get('/dashboard', [DashboardController::class, 'profile'])->middleware('auth');

Route::post('/dashboard/upload', [UserAvatarController::class, 'update'])->middleware('auth');

Route::get('/addpost', function () {
    return view('addpost', [
			'user' => Auth::user(),
		]);
})->middleware('auth');

Route::post('/addpost/submit', [PostController::class, 'store'])->middleware('auth');

require __DIR__.'/auth.php';
