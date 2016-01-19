<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //
    protected $table = 'Customers';

    public function testimonials() {

        return $this->hasMany('App\Testimony');
    }

    public function properties() {

        return $this->hasMany('App\Property');
    }

    public function inquiries() {

        return $this->hasMany('App\Inquiry');
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function($customer)
        {

        });

        static::updating(function($customer)
        {

        });

        static::deleting(function($customer)
        {

        });

        static::created(function($customer)
        {

        });

        static::updated(function($customer)
        {

        });

        static::deleted(function($customer)
        {

        });

    }
}
