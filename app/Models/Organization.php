<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name',
        'full_name',
        'inn',
        'kpp',
        'ogrn',
    ];
}
