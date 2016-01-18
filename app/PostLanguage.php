<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostLanguage extends Model
{
    //
    protected $table = 'PostLanguages';

    public function post() {

        return $this->belongsTo('App\Post');
    }
}
