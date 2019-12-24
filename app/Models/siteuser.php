<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class siteuser extends Model
{
    protected $table='siteuser';

    public $timestamps = false;

    public function blogpost()
    {
        return $this->hasMany('App\Models\blogpost','SiteuserID');
    }


}
