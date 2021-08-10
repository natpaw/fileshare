<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    /**
     * Update the avatar for the user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function profile(Request $request)
    {
		$user = Auth::user();
		$path = $user->avatar;
		$avatar = asset('storage/'.$path);
        return view('dashboard', [
			'user' => $user,
			'avatar' => $avatar,
		]);
    }
}