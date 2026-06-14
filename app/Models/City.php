<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * App\Models\City
 *
 * @property int $id
 * @property string $name Название города
 * @property string $code Код
 * @property string $prepositional Предложный падеж
 * @property string $genitive Родительный падеж
 * @property string $dative Дательный падеж
 * @property int $active Активность
 * @method static \Illuminate\Database\Eloquent\Builder|City newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|City newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|City query()
 * @method static \Illuminate\Database\Eloquent\Builder|City whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereDative($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereGenitive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City wherePrepositional($value)
 * @mixin \Eloquent
 */
class City extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'cities';

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
