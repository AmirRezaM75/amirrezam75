<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'user_id', 'text', 'post_id','user_id','comment_id'
    ];
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function post(){
        return $this->belongsTo('App\Post');
    }
    public function replies(){
        return $this->hasMany('App\Comment','comment_id');
    }
}
