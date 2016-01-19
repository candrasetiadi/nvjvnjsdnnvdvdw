<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    //
    protected $table = 'Inquiries';

    public function property()
    {
        return $this->belongsTo('App\Property');
    }

    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function($inquiry)
        {

        });

        static::updating(function($inquiry)
        {

        });

        static::deleting(function($inquiry)
        {

        });

        static::created(function($inquiry)
        {

        });

        static::updated(function($inquiry)
        {

        });

        static::deleted(function($inquiry)
        {

        });

    }
}
