<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
class CommentController extends Controller
{
    public function store(Request $request){
		$comment = Comment::create([
			'user_id' => Auth::user()->id,
			'body' => $request->comment,
			'post_id' => $request->post,
		]);
		return redirect(url()->previous());
	}
}
