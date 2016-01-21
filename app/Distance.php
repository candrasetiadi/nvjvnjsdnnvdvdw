<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Distance extends Model
{
    //
    protected $table = 'Distances';

    public function property()
    {
        return $this->belongsTo('App\Property');
    }
    
}
