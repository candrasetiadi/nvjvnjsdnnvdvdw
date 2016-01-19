<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $table = 'Categories';

    public function properties()
    {
        return $this->hasMany('App\Property');
    }

    public function categoryLanguages()
    {
        return $this->hasMany('App\CategoryLanguage');
    }
}
