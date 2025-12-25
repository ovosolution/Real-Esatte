<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlanPurchase extends Model
{
    protected $casts = [
        'features' => 'array',
    ];
    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
