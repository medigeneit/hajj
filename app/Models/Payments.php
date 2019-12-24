<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    protected $table='hajji_payments';

    protected $fillable = [
        'date', 'status','transaction_id','amount','transaction_type','hajji_id'
    ];
}
