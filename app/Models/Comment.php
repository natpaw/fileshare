<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
	
	protected $fillable = ['user_id', 'post_id', 'body'];
	protected $with = ['author'];
	
	public function author()
	{
		return $this->belongsTo(User::Class, 'user_id');
	}
}
