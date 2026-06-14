<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\File
 *
 * @property int $id
 * @property string $name Название
 * @property string $file_name Название файла
 * @property string|null $mime_type Тип файла
 * @property string $path Путь до файла
 * @property int $size Размер файла
 * @property string $directory Директория
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|File newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|File newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|File query()
 * @method static \Illuminate\Database\Eloquent\Builder|File whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereDirectory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereFileName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereMimeType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File wherePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class File extends Model
{
    use HasFactory;

    protected $table = 'files';

    protected $fillable = [
        'name',
        'file_name',
        'mime_type',
        'path',
        'size',
        'directory'
    ];
}
