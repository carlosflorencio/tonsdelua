<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = ['type', 'name', 'layout'];

    /*
    |--------------------------------------------------------------------------
    | Methods
    |--------------------------------------------------------------------------
    */
    public function pointing()
    {
        return $this->hasOne('App\Module', 'url_to')->select(DB::raw('url_to, count(*) as count'))->groupBy('url_to');
    }

    //This is got via a magic method whenever you call $this->likeCount (built into Eloquent by default)
    public function getPointingCountAttribute()
    {
        if ($this->pointing) return $this->pointing->count;
        return 0;
    }

    /*
    |--------------------------------------------------------------------------
    | Relations
    |--------------------------------------------------------------------------
    */
    public function modules() {
        return $this->hasMany('App\Module');
    }

    /*
    |--------------------------------------------------------------------------
    | Scopes
    |--------------------------------------------------------------------------
    */
    public function scopeProduct($query)
    {
        return $query->where('type', 'product');
    }

    public function scopePage($query)
    {
        return $query->where('type', 'page');
    }
}
