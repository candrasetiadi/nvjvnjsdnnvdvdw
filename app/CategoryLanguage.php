<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryLanguage extends Model
{
    //
    protected $table = 'CategoryLanguages';

    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
