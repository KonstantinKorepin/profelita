<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\FormSendLog
 *
 * @property int $id
 * @property string $code Код формы
 * @property string $message Содержимое формы
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|FormSendLog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FormSendLog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FormSendLog query()
 * @method static \Illuminate\Database\Eloquent\Builder|FormSendLog whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormSendLog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormSendLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormSendLog whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormSendLog whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class FormSendLog extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'form_send_logs';

}
