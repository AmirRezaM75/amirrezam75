<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','username','status','role_id','photo_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role(){
        return $this->belongsTo('App\Role');
    }

    public function photo() {
        return $this->belongsTo('App\Photo');
    }


    public function isAdmin(){
        if ($this->role->name == "administrator"){
            return true;
        }
        return false;
    }

    public function isAuthor(){
        if ($this->role->name == "author" && $this->status == 1){
            return true;
        }
        return false;
    }

    public function likes(){
        return $this->hasMany('App\Like');
    }

}
