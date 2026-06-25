<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ServiceTemplate extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'specialization_id',
        'parent_id',
        'name',
        'code',
        'h1',
        'title',
        'description',
        'default_template',
        'main_service',
        'on_city_list',
        'section',
        'default_price',
        'sort'
    ];

    public function specialization(): BelongsTo
    {
        return $this->belongsTo(Specialization::class);
    }
}
