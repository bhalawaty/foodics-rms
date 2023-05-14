<?php

namespace App\Modules\Order\Services;

use App\Modules\Order\Models\Order;

interface OrderServiceInterface
{
    /**
     * @param array $data
     * @return Order
     */
    public function create(array $data): Order;
}
