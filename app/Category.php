<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $table = 'Categories';

    public function properties()
    {
        return $this->hasMany('App\Property');
    }

    public function categoryLanguages()
    {
        return $this->hasMany('App\CategoryLanguage');
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function($category)
        {

        });

        static::updating(function($category)
        {

        });

        static::deleting(function($category)
        {

        });

        static::created(function($category)
        {

        });

        static::updated(function($category)
        {

        });

        static::deleted(function($category)
        {

        });

    }

}