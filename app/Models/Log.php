<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $fillable = [
        'text',
        'function',
        'answer',
        'execution_time'
    ];
}
