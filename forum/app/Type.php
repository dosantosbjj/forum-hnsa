<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    private $tablename = "Type";
    public $timestamps = false;

    public function user()
    {
        return $this->hasMany('App\User');
    }
}
