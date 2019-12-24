<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    protected $table='services';

    protected $fillable = [
        'title', 'short_description','description','icon_class','status'
    ];
}
