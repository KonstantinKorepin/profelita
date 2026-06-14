<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Url
 *
 * @property int $id
 * @property string $url URL
 * @property int $entity_id Идентификатор сущности
 * @property string $entity_class Класс сущности
 * @property int|null $master_id Мастер
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Master|null $master
 * @method static \Illuminate\Database\Eloquent\Builder|Url newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Url newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Url query()
 * @method static \Illuminate\Database\Eloquent\Builder|Url whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Url whereEntityClass($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Url whereEntityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Url whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Url whereMasterId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Url whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Url whereUrl($value)
 * @mixin \Eloquent
 */
class Url extends Model
{
    use HasFactory;

    const CITY = 'city';
    const SERVICE = 'service';
    const MASTER = 'master';

    protected $table = 'urls';

    protected $fillable = [
        'url',
        'entity_id',
        'entity_class',
        'master_id',
    ];

    /**
     * @return BelongsTo
     */
    public function master(): BelongsTo
    {
        return $this->belongsTo(Master::class);
    }
}
