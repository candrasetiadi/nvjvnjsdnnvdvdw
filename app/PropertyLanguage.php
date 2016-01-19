<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PropertyLanguage extends Model
{
    //
    protected $table = 'PropertyLanguages';

    public function property()
    {
        return $this->belongsTo('App\Property');
    }

    public function language()
    {
        return $this->belongsTo('App\Language');
    }
}
