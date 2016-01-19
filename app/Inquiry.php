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
}
