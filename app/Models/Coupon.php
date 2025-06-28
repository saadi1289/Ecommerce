<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $fillable = [
        'name',
        'code',
        'type', // 'percentage' or 'fixed'
        'value', // Value of the coupon
        'start_date', // When the coupon becomes active
        'end_date', // When the coupon expires
        'usage_limit', // Maximum number of times the coupon can be used
        'used_count', // Number of times the coupon has been used
        'is_active', // Whether the coupon is currently active
        'is_single_use' // Whether the coupon can be used only once per user
    ];

    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
        'is_active' => 'boolean',
        'is_single_use' => 'boolean'
    ];

    
}
