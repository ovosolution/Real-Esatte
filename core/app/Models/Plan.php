<?php

namespace App\Models;

use App\Traits\GlobalStatus;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use GlobalStatus;
    protected $casts = [
        'features' => 'array',
    ];

    public function purchases()
    {
        return $this->hasMany(PlanPurchase::class);
    }

    public function deposits()
    {
        return $this->hasMany(Deposit::class);
    }

}
