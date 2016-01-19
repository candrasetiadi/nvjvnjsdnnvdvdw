<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryLanguage extends Model
{
    //
    protected $table = 'CategoryLanguages';

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function($categoryLanguage)
        {

        });

        static::updating(function($categoryLanguage)
        {

        });

        static::deleting(function($categoryLanguage)
        {

        });

        static::created(function($categoryLanguage)
        {

        });

        static::updated(function($categoryLanguage)
        {

        });

        static::deleted(function($categoryLanguage)
        {

        });

    }

}
