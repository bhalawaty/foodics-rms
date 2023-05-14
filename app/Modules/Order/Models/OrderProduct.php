<?php

namespace App\Modules\Order\Models;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    protected $fillable = ['quantity', 'total_amount'];
}
