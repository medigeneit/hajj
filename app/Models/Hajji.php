<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hajji extends Model
{
    protected $table='hajj_setup';

    protected $fillable = [
        'title','hajj_date','last_date_passport','status'
    ];
}
