<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
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
 */
	class Url extends \Eloquent {}
}

