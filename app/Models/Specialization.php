<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Specialization
 *
 * @property int $id
 * @property string $name Название сервиса
 * @property string $catalog_name Название специализации в каталоге
 * @property string $catalog_caption_list Заголовок списка услуг
 * @property string $code Название сервиса в каталоге
 * @property int $active Активность
 * @method static \Illuminate\Database\Eloquent\Builder|Specialization newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Specialization newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Specialization query()
 * @method static \Illuminate\Database\Eloquent\Builder|Specialization whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Specialization whereCatalogCaptionList($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Specialization whereCatalogName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Specialization whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Specialization whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Specialization whereName($value)
 * @mixin \Eloquent
 */
class Specialization extends Model
{
    use HasFactory;

    const PLUMBER = 'plumber';
    const ELECTRICIAN = 'electrician';

    protected $table = 'specializations';

    protected $fillable = [
        'name',
        'code',
        'catalog_name',
        'catalog_caption_list',
        'active'
    ];
}
