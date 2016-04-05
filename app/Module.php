<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    /*
    |--------------------------------------------------------------------------
    | Relations
    |--------------------------------------------------------------------------
    */
    public function page() {
        return $this->belongsTo('App\Page');
    }

    public function images() {
        return $this->hasMany('App\Image');
    }
}
