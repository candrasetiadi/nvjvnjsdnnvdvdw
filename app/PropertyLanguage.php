<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PropertyLanguage extends Model
{
    //
    protected $table = 'PropertyLanguages';

    public function property()
    {
        return $this->belongsTo('App\Property');
    }

    public function language()
    {
        return $this->belongsTo('App\Language');
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function($propertyLanguage)
        {

        });

        static::updating(function($propertyLanguage)
        {

        });

        static::deleting(function($propertyLanguage)
        {

        });

        static::created(function($propertyLanguage)
        {

        });

        static::updated(function($propertyLanguage)
        {

        });

        static::deleted(function($propertyLanguage)
        {

        });

    }

}
