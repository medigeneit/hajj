<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PassportInfo extends Model
{
    protected $table='hajji_passport_info';

    protected $fillable = [
        'passport_no', 'issue_date','expired_date','issue_place','passport_type','passport_photo','is_submit_passport','hajji_id'
    ];
}
