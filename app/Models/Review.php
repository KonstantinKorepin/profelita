<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Review
 *
 * @property int $id
 * @property int $master_id Мастер
 * @property int $rating Рейтинг
 * @property string $name Имя оставившего отзыв
 * @property string|null $review Текст отзыва
 * @property string $date Дата отзыва
 * @property int $on_front Выводить на главной странице "Отзывы"
 * @method static \Illuminate\Database\Eloquent\Builder|Review newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Review newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Review query()
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereMasterId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereOnFront($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereRating($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereReview($value)
 * @mixin \Eloquent
 */
class Review extends Model
{
    use HasFactory;

    protected $table = 'reviews';

    protected $fillable = [
        'master_id',
        'rating',
        'name',
        'review',
        'date',
        'on_front'
    ];
}


