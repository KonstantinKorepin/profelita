<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Specialization extends Model
{
    const PLUMBER = 'plumber';
    const ELECTRICIAN = 'electrician';

    public $timestamps = false;

    protected $fillable = [
        'name',
        'code',
        'catalog_name',
        'catalog_caption_list',
        'active'
    ];
}
