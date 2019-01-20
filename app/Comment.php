<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [ 'comment', 'published', 'user_id'];

    public function author(){
    	return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function post() {
    	return $this->belongsTo(Post::class, 'user_id', 'id');
    }
}
