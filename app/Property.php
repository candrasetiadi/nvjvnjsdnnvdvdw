<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    //
    protected $table = 'Properties';

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    // optional
    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }

    public function propertyLanguages()
    {
        return $this->hasMany('App\PropertyLanguage');
    }

    public function propertyFiles()
    {
        return $this->hasMany('App\PropertyFile');
    }

    public function inquiry()
    {
        return $this->hasMany('App\Inquiry');
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function($property)
        {

        });

        static::updating(function($property)
        {

        });

        static::deleting(function($property)
        {

        });

        static::created(function($property)
        {

        });

        static::updated(function($property)
        {

        });

        static::deleted(function($property)
        {

        });

    }

}
