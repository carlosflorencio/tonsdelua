<?php

namespace App;

use File;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{

    /*
    |--------------------------------------------------------------------------
    | Relations
    |--------------------------------------------------------------------------
    */
    public function module() {
        return $this->belongsTo('App\Module');
    }

    /*
    |--------------------------------------------------------------------------
    | Events
    |--------------------------------------------------------------------------
    */
    public function delete()
    {
        // Delete image
        if (File::exists(public_path($this->path))) {
            File::delete(public_path($this->path));
        }

        return parent::delete();
    }

    /*
    |--------------------------------------------------------------------------
    | Mutators
    |--------------------------------------------------------------------------
    */
    public function getPathAttribute($value)
    {
        // If image path is an url
        if(filter_var($value, FILTER_VALIDATE_URL)) {
            return $value;
        }

        return asset($value);
    }
}
