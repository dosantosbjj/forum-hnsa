<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // private $tablename = "Post";
    public $timestamps = false;

    public function comments(){
        return $this->hasMany('App\Comments');   
    }

    public function user(){
        return $this->hasOne('App\User');
    }
}