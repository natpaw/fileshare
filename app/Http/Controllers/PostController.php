<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function store(Request $request){
		$post = Post::create([
			'user_id' => Auth::user()->id,
			'title' => $request->title,
			'short' => $request->short,
			'body' => $request->body,
			'slug' => str_slug($request->title),
			'image' => $request->file('image')->store('images'),
			'file' => $request->file('file')->storeAs('files', $request->file('file')->getClientOriginalName()),
		]);
		return redirect('/');
	}
	
	public function search(Request $request){
    $search = $request->input('search');

    $posts = Post::query()
        ->where('title', 'LIKE', "%{$search}%")
        ->orWhere('body', 'LIKE', "%{$search}%")
		->orWhere('short', 'LIKE', "%{$search}%")
        ->paginate(3);

     return view('main', [
		'posts' => $posts,
	]);
	}
}
