<?php

namespace App\Modules\Order\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    protected $fillable = [
        'total_cost',
    ];

    public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }
}
