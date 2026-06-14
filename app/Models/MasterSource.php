<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\MasterSource
 *
 * @property int $id
 * @property string $name
 * @property string $code
 * @method static \Illuminate\Database\Eloquent\Builder|MasterSource newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MasterSource newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MasterSource query()
 * @method static \Illuminate\Database\Eloquent\Builder|MasterSource whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MasterSource whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MasterSource whereName($value)
 * @mixin \Eloquent
 */
class MasterSource extends Model
{
    use HasFactory;

    protected $table = 'master_sources';

    protected $fillable = [
        'name',
        'code',
    ];
}
