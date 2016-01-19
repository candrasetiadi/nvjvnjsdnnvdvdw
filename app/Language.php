<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    //
    protected $table = 'Languages';

    public function propertyLanguages()
    {
        return $this->hasMany('App\PropertyLanguage');
    }

    public function categoryLanguages()
    {
        return $this->hasMany('App\CategoryLanguage');
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function($language)
        {

        });

        static::updating(function($language)
        {

        });

        static::deleting(function($language)
        {

        });

        static::created(function($language)
        {

        });

        static::updated(function($language)
        {

        });

        static::deleted(function($language)
        {

        });

    }
}
