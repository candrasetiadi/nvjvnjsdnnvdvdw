<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostCategoryLanguage extends Model
{
    //
    protected $table = 'PostCategoryLanguages';

    public function category() {

        return $this->belongsTo('App\PostCategory');
    }
}
