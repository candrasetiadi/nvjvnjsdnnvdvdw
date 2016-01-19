<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $table = 'Posts';

    public function category() {

        return $this->hasOne('App\PostCategory');
    }

    public function language() {

        return $this->hasMany('App\PostLanguage');
    }

    public function branch() {

        return $this->belongsTo('App\Branch');
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function($post)
        {

        });

        static::updating(function($post)
        {

        });

        static::deleting(function($post)
        {

        });

        static::created(function($post)
        {

        });

        static::updated(function($post)
        {

        });

        static::deleted(function($post)
        {

        });

    }
}
