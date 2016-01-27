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

    public function lang()
    {
        $categoryLanguages = $this->categoryLanguages()->where('locale', \Lang::getLocale())->first();

        if(!$categoryLanguages) $categoryLanguages = $this->categoryLanguages()->where('locale', 'en')->first();

        return $categoryLanguages;

    }

    public function name()
    {
        $categoryLanguages = $this->categoryLanguages()->where('locale', \Lang::getLocale())->first();

        if(!$categoryLanguages) $categoryLanguages = $this->categoryLanguages()->where('locale', 'en')->first();

        return $categoryLanguages->title;

    }

    public function parentName()
    {
        $categoryLanguages = \App\CategoryLanguage::where('locale', \Lang::getLocale())->where('category_id', $this->parent)->first();

        if(!$categoryLanguages) $categoryLanguages = \App\CategoryLanguage::where('locale', 'en')->where('category_id', $this->parent)->first();

        return $categoryLanguages ? $categoryLanguages->title : '-' ;

    }

    public static function boot()
    {
        parent::boot();

        static::creating(function($category)
        {

        });

        static::updating(function($category)
        {

        });

        static::deleting(function($category)
        {
            if ($category->categoryLanguages) {

                $category->categoryLanguages()->delete();
            }

        });

        static::created(function($category)
        {

        });

        static::updated(function($category)
        {

        });

        static::deleted(function($category)
        {

        });

    }

}
