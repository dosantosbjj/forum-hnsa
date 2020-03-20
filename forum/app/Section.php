<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $tablename = 'Section';
    public $timestamps = false;

    public function user(){
        return $this->hasMany('App\User');
    }
}
