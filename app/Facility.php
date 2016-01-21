<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    //
    protected $table = 'Facilities';

    public function property()
    {
        return $this->belongsTo('App\Property');
    }
    
}
