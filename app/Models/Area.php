<?php

namespace App\Models;

use Barryvdh\LaravelIdeHelper\Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Area
 *
 * @property int $id
 * @property string $name Название района
 * @property string $code Код района
 * @property string $description Описание района
 * @method static \Illuminate\Database\Eloquent\Builder|Area newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Area newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Area query()
 * @method static \Illuminate\Database\Eloquent\Builder|Area whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Area whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Area whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Area whereName($value)
 * @mixin Eloquent
 */
class Area extends Model
{
    use HasFactory;

    protected $table = 'areas';

    protected $fillable = [
        'name',
        'code',
        'description',
    ];
}
