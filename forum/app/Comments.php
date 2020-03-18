<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    private $tablename = "Comments";
    public $timestamps = false;

    public function user(){
        return $this->hasOne('App\User');
    }
}
