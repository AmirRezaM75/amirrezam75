<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = ['name','text','role','photo_id'];

    public function photo() {
        return $this->belongsTo('App\Photo');
    }

    public function getImageAttribute()
    {
        return asset('storage/members/' . $this->photo->path);
    }
}
