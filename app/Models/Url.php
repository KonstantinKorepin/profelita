<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Url extends Model
{
    const CITY = 'city';
    const SERVICE = 'service';
    const MASTER = 'master';

    protected $fillable = [
        'url',
        'entity_id',
        'entity_class',
        'master_id',
    ];

    public function master(): BelongsTo
    {
        return $this->belongsTo(Master::class);
    }
}
