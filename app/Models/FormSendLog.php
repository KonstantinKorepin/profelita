<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FormSendLog extends Model
{
    protected $fillable = [
        'code',
        'message',
    ];
}
