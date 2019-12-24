<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ambassador extends Model
{
    protected $table='ambassador';

    protected $fillable = [
        'name', 'location', 'duration','status','priority'
    ];
}
