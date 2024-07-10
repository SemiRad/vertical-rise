<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'shirt_id',
        'order_date',
        'note',
        'order_status',
        'fulfilled_at',
        'cancelled_at',
    ];

    // Other model code...
}

