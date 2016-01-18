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
}
