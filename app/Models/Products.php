<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table='products';

    protected $fillable = [
        'title','slug','short_description','description','template','image','attachment_name','attachment','extra','extra1'
    ];
}
