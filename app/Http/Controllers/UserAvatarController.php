<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
class UserAvatarController extends Controller
{
    /**
     * Update the avatar for the user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user = Auth::user();
		$old = $user->avatar;
        Storage::delete($old);
		$path = $request->file('fileToUpload')->store('avatars');
		$user->avatar = $path;
		$user->save();
		
        return redirect(url()->previous());
    }
}