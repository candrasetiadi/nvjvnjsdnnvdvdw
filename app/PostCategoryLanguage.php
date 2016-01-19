<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostCategoryLanguage extends Model
{
    //
    protected $table = 'PostCategoryLanguages';

    public function category() {

        return $this->belongsTo('App\PostCategory', 'category_id');
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function($postCategoryLanguage)
        {

        });

        static::updating(function($postCategoryLanguage)
        {

        });

        static::deleting(function($postCategoryLanguage)
        {

        });

        static::created(function($postCategoryLanguage)
        {

        });

        static::updated(function($postCategoryLanguage)
        {

        });

        static::deleted(function($postCategoryLanguage)
        {

        });

    }

}
