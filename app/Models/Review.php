<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Review extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'master_id',
        'rating',
        'name',
        'review',
        'date',
        'on_front'
    ];

    public function master(): BelongsTo
    {
        return $this->belongsTo(Master::class);
    }
}
