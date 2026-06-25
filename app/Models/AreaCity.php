<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AreaCity extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'city_id',
        'area_id',
    ];
}
