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

    public static function boot()
    {
        parent::boot();

        static::creating(function($branch)
        {

        });

        static::updating(function($branch)
        {

        });

        static::deleting(function($branch)
        {

        });

        static::created(function($branch)
        {

        });

        static::updated(function($branch)
        {

        });

        static::deleted(function($branch)
        {

        });

    }
}
