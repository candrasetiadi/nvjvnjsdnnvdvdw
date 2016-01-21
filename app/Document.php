<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    //
    protected $table = 'Documents';

    public function property()
    {
        return $this->belongsTo('App\Property');
    }
}
