<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected $fillable = [
        'user_id', 'text', 'comment_id','user_id'
    ];
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function post(){
        return $this->belongsTo('App\Post');
    }
}
