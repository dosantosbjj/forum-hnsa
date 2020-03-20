<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $dates = [
        'post_date',
        'updated_at',
    ];

    public $timestamps = false;

    public function comments(){
        return $this->hasMany('App\Comments');   
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
}