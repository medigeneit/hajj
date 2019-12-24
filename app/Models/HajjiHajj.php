<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HajjiHajj extends Model
{
    protected $table='hajji_hajj';

    protected $fillable = [
        'year', 'type','package_id','features','quantity','total_price','group_id','hajji_id'
    ];
}
