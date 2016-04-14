<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    protected $fillable = ['description', 'type', 'youtube', 'url_to', 'caption', 'page_id'];

    /*
    |--------------------------------------------------------------------------
    | Scopes
    |--------------------------------------------------------------------------
    */
    public function scopeImagem($query)
    {
        return $query->where('type', 'imagem');
    }

    public function scopeSlideshow($query)
    {
        return $query->where('type', 'slideshow');
    }

    public function scopeYoutube($query)
    {
        return $query->where('type', 'youtube');
    }

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

    /*
    |--------------------------------------------------------------------------
    | Events
    |--------------------------------------------------------------------------
    */
    public function delete() {

        foreach ($this->images as $image) {
            $image->delete();
        }

        return parent::delete();
    }
}
