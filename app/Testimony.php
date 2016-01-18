<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testimony extends Model
{
    //
    protected $table = 'Testimonials';

    public function customer() {

        return $this->belongsTo('App\Customer');
    }
}
