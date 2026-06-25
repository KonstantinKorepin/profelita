<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class City extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name',
        'code',
        'prepositional',
        'genitive',
        'active'
    ];

    public function areas(): BelongsToMany
    {
        return $this->belongsToMany(Area::class, 'area_cities', 'city_id', 'area_id');
    }
}
