<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    //
    protected $table = 'Languages';

    public function propertyLanguages()
    {
        return $this->hasMany('App\PropertyLanguage');
    }

    public function categoryLanguages()
    {
        return $this->hasMany('App\CategoryLanguage');
    }
}
