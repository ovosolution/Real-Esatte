<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ScheduleNotification extends Model
{
    protected $casts = [
        'meta_data' => 'object',
    ];
}
