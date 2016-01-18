<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostCategory extends Model
{
    //
    protected $table = 'PostCategories';

    public function languages() {

        return $this->hasMany('App\PostCategoryLanguages');
    }

    public function post() {

        return $this->belongsTo('App\Post');
    }
}
