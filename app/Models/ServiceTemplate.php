<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\ServiceTemplate
 *
 * @property int $id
 * @property int $specialization_id Специализация
 * @property int|null $parent_id Родитель
 * @property string $name Название шаблона услуги
 * @property string $catalog_name Общее наазвание шаблона услуги в каталоге
 * @property string $code Код шаблона услуги
 * @property string $h1 H1 шаблона услуги
 * @property string $title Title шаблона услуги
 * @property string $description Description шаблона услуги
 * @property string $default_template Шаблон по умолчанию
 * @property int $main_service Главная услуга специализации
 * @property int $on_city_list Выводить в списке на странице города
 * @property int $section Услуга или секция
 * @property int|null $default_price Цена по умолчанию
 * @property int $sort Сортировка
 * @property-read \App\Models\Specialization $specialization
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceTemplate newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceTemplate newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceTemplate query()
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceTemplate whereCatalogName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceTemplate whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceTemplate whereDefaultPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceTemplate whereDefaultTemplate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceTemplate whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceTemplate whereH1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceTemplate whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceTemplate whereMainService($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceTemplate whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceTemplate whereOnCityList($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceTemplate whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceTemplate whereSection($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceTemplate whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceTemplate whereSpecializationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceTemplate whereTitle($value)
 * @mixin \Eloquent
 */
class ServiceTemplate extends Model
{
    use HasFactory;

    protected $table = 'service_templates';

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

    /**
     * @return BelongsTo
     */
    public function specialization(): BelongsTo
    {
        return $this->belongsTo(Specialization::class);
    }
}
