<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    //
    protected $table = 'Branches';

    public function users() {

        return $this->hasMany('App\User');
    }

    public function posts() {

        return $this->hasMany('App\Post');
    }
}
