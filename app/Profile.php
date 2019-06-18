<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'title', 'bio', 'url', 'picture', 'phone', 'gender'
    ];

    //
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function profilePicture() {
        if(strstr($this->picture, 'http')) {
            return $this->picture;
        } else {
            return asset('storage/thumbnails/'.$this->picture);
        }
    }
}
