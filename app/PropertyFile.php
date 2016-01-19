<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PropertyFile extends Model
{
    //
    protected $table = 'PropertyFiles';

    public function property()
    {
        return $this->belongsTo('App\Property');
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function($propertyFile)
        {

        });

        static::updating(function($propertyFile)
        {

        });

        static::deleting(function($propertyFile)
        {

        });

        static::created(function($propertyFile)
        {

        });

        static::updated(function($propertyFile)
        {

        });

        static::deleted(function($propertyFile)
        {

        });

    }

}
