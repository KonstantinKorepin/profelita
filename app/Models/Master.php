<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Master extends Model
{
    const MASTER_SEO_TITLE_POSTFIX = ': биография, образование, отзывы';
    const MASTER_SEO_DESCRIPTION_PREFIX = 'Профессиональный';
    const MASTER_SEO_DESCRIPTION_FROM = 'из';
    const SEO_KEYWORDS = ['вызов на дом', 'бытовые услуги'];

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

    public function getFullName(): string
    {
        return implode(' ', [
            $this->last_name,
            $this->first_name,
            $this->middle_name
        ]);
    }

    public function getSeoTitle(): string
    {
        return implode('', [
            $this->getFullName(),
            sprintf('. '),
            $this->specialization->name,
            self::MASTER_SEO_TITLE_POSTFIX
        ]);
    }

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

    public function getSeoKeywords(): string
    {
        $keywords = [
            mb_strtolower($this->specialization->name),
            $this->city->name
        ];
        $keywords = array_merge($keywords, self::SEO_KEYWORDS);
        return implode(', ', $keywords);
    }

    public function specialization(): BelongsTo
    {
        return $this->belongsTo(Specialization::class);
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    public function profileFile(): BelongsTo
    {
        return $this->belongsTo(File::class, 'profile_file_id', 'id');
    }

    public function listFile(): BelongsTo
    {
        return $this->belongsTo(File::class, 'list_file_id', 'id');
    }
}
