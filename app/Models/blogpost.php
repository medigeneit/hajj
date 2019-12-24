<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class blogpost extends Model
{
    protected $table='news_posts';

    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo('App\Models\siteuser','SiteuserID');
    }
}
