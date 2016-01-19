<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostLanguage extends Model
{
    //
    protected $table = 'PostLanguages';

    public function post() {

        return $this->belongsTo('App\Post');
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function($postLanguage)
        {

        });

        static::updating(function($postLanguage)
        {

        });

        static::deleting(function($postLanguage)
        {

        });

        static::created(function($postLanguage)
        {

        });

        static::updated(function($postLanguage)
        {

        });

        static::deleted(function($postLanguage)
        {

        });

    }
}
