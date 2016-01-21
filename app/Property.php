<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Property extends Model
{
    //
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    
    protected $table = 'Properties';

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    // optional
    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }

    public function propertyLanguages()
    {
        return $this->hasMany('App\PropertyLanguage');
    }

    public function propertyFiles()
    {
        return $this->hasMany('App\PropertyFile');
    }

    public function inquiries()
    {
        return $this->hasMany('App\Inquiry');
    }

    public function facilities()
    {
        return $this->hasMany('App\Facility');
    }

    public function lang()
    {

        $propertyLanguages = $this->propertyLanguages()->where('locale', \Lang::getLocale());

        if ($propertyLanguages->count() > 0) {

            return $propertyLanguages->first();

        } else {

            return $this->propertyLanguages()->where('locale', 'en')->first();
        }
    }

    public function categoryName()
    {
        $categoryLanguages = $this->category->categoryLanguages()->where('locale', \Lang::getLocale());

        if ($categoryLanguages->count() > 0) {

            return $categoryLanguages->first()->title;

        } else {

            return $this->category->categoryLanguages()->where('locale', 'en')->first()->title;
        }

    }

    public static function boot()
    {
        parent::boot();

        static::creating(function($property)
        {

        });

        static::updating(function($property)
        {

        });

        static::deleting(function($property)
        {

        });

        static::created(function($property)
        {
            if ($property->propertyLanguages()->count() == 0) {

                $property->propertyLanguages()->save(factory(\App\PropertyLanguage::class)->make());
            }

        });

        static::updated(function($property)
        {

        });

        static::deleted(function($property)
        {

        });

    }

}
