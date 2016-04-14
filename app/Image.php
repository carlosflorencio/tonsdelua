<?php

namespace App;

use File;
use Illuminate\Database\Eloquent\Model;
use Storage;

class Image extends Model
{
    protected $fillable = ['path', 'module_id'];

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
        if (Storage::disk('images')->exists($this->path)) {
            Storage::disk('images')->delete($this->path);
        }

        return parent::delete();
    }

    /*
    |--------------------------------------------------------------------------
    | Methods
    |--------------------------------------------------------------------------
    */
    public function link()
    {
        // If image path is an url
        if(filter_var($this->path, FILTER_VALIDATE_URL)) {
            return $this->path;
        }

        return asset("img/" . $this->path);
    }

}
