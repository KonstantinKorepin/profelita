<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Organization
 *
 * @property int $id
 * @property string $name Название организации
 * @property string $full_name Полное название организации
 * @property string $inn ИНН
 * @property string $kpp КПП
 * @property string $ogrn ОГРН
 * @method static \Illuminate\Database\Eloquent\Builder|Organization newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Organization newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Organization query()
 * @method static \Illuminate\Database\Eloquent\Builder|Organization whereFullName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Organization whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Organization whereInn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Organization whereKpp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Organization whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Organization whereOgrn($value)
 * @mixin \Eloquent
 */
class Organization extends Model
{
    use HasFactory;

    protected $table = 'organizations';

    protected $fillable = [
        'name',
        'full_name',
        'inn',
        'kpp',
        'ogrn',
    ];
}
