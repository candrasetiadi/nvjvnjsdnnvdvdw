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
}
