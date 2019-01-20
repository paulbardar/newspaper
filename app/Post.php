<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use SahusoftCom\EloquentImageMutator\EloquentImageMutatorTrait;

class Post extends Model

{
	use EloquentImageMutatorTrait;

	protected $image_fields = ['image'];

	protected $fillable = ['title','content','category_id','published','author_id','image'];

    public function comments(){
    	return $this->hasMany(Comment::class, 'post_id', 'id');
    }

    public function author() {
    	return $this->belongsTo(User::class, 'author_id', 'id');
    }

    public function category(){
    	return $this->belongsTo(Category::class);
    }
}
