<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Master
 *
 * @property int $id
 * @property int $city_id Город
 * @property int $specialization_id Специализация
 * @property int $master_sources_id Специализация
 * @property int|null $profile_file_id Аватарка профиля
 * @property int|null $list_file_id Аватарка в списке
 * @property string $last_name Фамилия
 * @property string $first_name Имя
 * @property string|null $middle_name Отчество
 * @property string $phone Телефон
 * @property float $rating Средняя оценка
 * @property string $start_working_hours Время начала рабочего дня
 * @property string $end_working_hours Время окончания рабочего дня
 * @property float $warranty_period Срок гарантии на работы
 * @property int $professional_activity_year Год начала профессиональной деятельности
 * @property int $count_realized_orders Количество реализованных заказов в сервисе
 * @property string $education Образование
 * @property string $description Описание
 * @property string $url_source Ссылка на источник
 * @property int $on_front Вывод на странице со списком мастеров
 * @property int $actual Актуальны ли данные по мастеру
 * @property string|null $address Адрес
 * @property string|null $map Карта
 * @property-read \App\Models\City $city
 * @property-read \App\Models\File|null $listFile
 * @property-read \App\Models\File|null $profileFile
 * @property-read \App\Models\Specialization $specialization
 * @method static \Illuminate\Database\Eloquent\Builder|Master newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Master newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Master query()
 * @method static \Illuminate\Database\Eloquent\Builder|Master whereActual($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Master whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Master whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Master whereCountRealizedOrders($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Master whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Master whereEducation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Master whereEndWorkingHours($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Master whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Master whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Master whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Master whereListFileId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Master whereMap($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Master whereMasterSourcesId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Master whereMiddleName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Master whereOnFront($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Master wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Master whereProfessionalActivityYear($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Master whereProfileFileId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Master whereRating($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Master whereSpecializationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Master whereStartWorkingHours($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Master whereUrlSource($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Master whereWarrantyPeriod($value)
 * @mixin \Eloquent
 */
class Master extends Model
{
    use HasFactory;

    const MASTER_SEO_TITLE_POSTFIX = ': биография, образование, отзывы';
    const MASTER_SEO_DESCRIPTION_PREFIX = 'Профессиональный';
    const MASTER_SEO_DESCRIPTION_FROM = 'из';

    const SEO_KEYWORDS = ['вызов на дом', 'бытовые услуги'];

    protected $table = 'masters';

    public $timestamps = false;

    protected $fillable = [
        'city_id',
        'specialization_id',
        'master_sources_id',
        'profile_file_id',
        'list_file_id',
        'last_name',
        'first_name',
        'middle_name',
        'start_working_hours',
        'end_working_hours',
        'warranty_period',
        'professional_activity_year',
        'count_realized_orders',
        'education',
        'description',
        'url_source',
        'on_front',
        'actual',
        'address',
        'map'
    ];

    /**
     * @return string
     */
    public function getFullName(): string
    {
        return implode(' ', [$this->last_name, $this->first_name, $this->middle_name]);
    }

    /**
     * @return string
     */
    public function getSeoTitle(): string
    {
        return $this->getFullName() . '. ' . $this->specialization->name . self::MASTER_SEO_TITLE_POSTFIX;
    }

    /**
     * @return string
     */
    public function getSeoDescription(): string
    {
        $cityPrepositional = $this->city->genitive;
        return implode(' ', [
            self::MASTER_SEO_DESCRIPTION_PREFIX,
            mb_strtolower($this->specialization->name),
            $this->getFullName(),
            self::MASTER_SEO_DESCRIPTION_FROM,
            $cityPrepositional
        ]);
    }

    /**
     * @return string
     */
    public function getSeoKeywords(): string
    {
        $cityName = $this->city->name;

        $keywords = [
                mb_strtolower($this->specialization->name),
                $cityName
        ];
        $keywords = array_merge($keywords, self::SEO_KEYWORDS);
        return implode(', ', $keywords);
    }

    /**
     * @return BelongsTo
     */
    public function specialization(): BelongsTo
    {
        return $this->belongsTo(Specialization::class, 'specialization_id', 'id');
    }

    /**
     * @return BelongsTo
     */
    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    /**
     * @return BelongsTo
     */
    public function profileFile(): BelongsTo
    {
        return $this->belongsTo(File::class, 'profile_file_id', 'id');
    }

    /**
     * @return BelongsTo
     */
    public function listFile(): BelongsTo
    {
        return $this->belongsTo(File::class, 'list_file_id', 'id');
    }

    /**
     * получает номер телефона мастреа без пробелов
     * @return string
     */
    public function getClearPhone(): string
    {
        return preg_replace('/(-|\s)/', '', $this->phone);
    }
}
