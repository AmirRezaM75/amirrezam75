<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $fillable = [
        'user_id','post_id'
    ];
    public function user(){
        $this->belongsTo('App\User');
    }
    public function post(){
        $this->belongsTo('App\Post');
    }
}
