<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Service
 *
 * @property int $id
 * @property int|null $master_id Мастер
 * @property int|null $organization_id Организация
 * @property int $service_templates_id Шаблон услуги
 * @property int|null $parent_id Родитель
 * @property string $name Кастомное название шаблона услуги
 * @property string $h1 Кастомный H1 шаблона услуги
 * @property string $title Кастомный Title шаблона услуги
 * @property string $description Кастомный Description шаблона услуги
 * @property string $keywords Кастомный Keywords шаблона услуги
 * @property string $template Кастомный шаблон по умолчанию
 * @property int $main_service Главная услуга специализации
 * @property int $on_city_list Выводить в списке на странице города
 * @property int $section Услуга или секция
 * @property int|null $price Цена по умолчанию
 * @property int $sort Сортировка
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Master|null $master
 * @property-read \App\Models\ServiceTemplate $serviceTemplate
 * @method static \Illuminate\Database\Eloquent\Builder|Service newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Service newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Service query()
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereH1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereKeywords($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereMainService($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereMasterId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereOnCityList($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereOrganizationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereSection($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereServiceTemplatesId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereTemplate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Service extends Model
{
    use HasFactory;

    protected $table = 'services';

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

    /**
     * @return BelongsTo
     */
    public function master(): BelongsTo
    {
        return $this->belongsTo(Master::class);
    }

    /**
     * @return BelongsTo
     */
    public function serviceTemplate(): BelongsTo
    {
        return $this->belongsTo(ServiceTemplate::class, 'service_templates_id');
    }
}
