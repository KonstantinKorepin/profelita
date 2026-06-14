<?php

namespace App\Models;

use Barryvdh\LaravelIdeHelper\Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\AreaCity
 *
 * @property int $city_id
 * @property int $area_id
 * @method static \Illuminate\Database\Eloquent\Builder|AreaCity newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AreaCity newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AreaCity query()
 * @method static \Illuminate\Database\Eloquent\Builder|AreaCity whereAreaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AreaCity whereCityId($value)
 * @mixin Eloquent
 */
class AreaCity extends Model
{
    use HasFactory;

    protected $table = 'area_cities';

    protected $fillable = [
        'city_id',
        'area_id',
    ];
}
