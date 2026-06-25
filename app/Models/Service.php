<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Service extends Model
{
    protected $fillable = [
        'master_id',
        'cities_id',
        'parent_id',
        'service_templates_id',
        'name',
        'h1',
        'title',
        'description',
        'keywords',
        'template',
        'main_service',
        'on_city_list',
        'section',
        'price',
        'sort'
    ];

    public function master(): BelongsTo
    {
        return $this->belongsTo(Master::class);
    }

    public function serviceTemplate(): BelongsTo
    {
        return $this->belongsTo(ServiceTemplate::class, 'service_templates_id');
    }
}
