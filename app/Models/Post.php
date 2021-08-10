<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;


class Post extends Model
{
    use HasFactory;
	
	protected $fillable = ['user_id', 'title', 'short', 'body', 'slug', 'image', 'file'];
	protected $with = ['author'];
	
	public function author()
	{
		return $this->belongsTo(User::Class, 'user_id');
	}
	
	public function comments()
	{
		return $this->hasMany(Comment::Class);
	}
}

