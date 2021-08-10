<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
}
