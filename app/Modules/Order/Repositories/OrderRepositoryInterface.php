<?php

namespace App\Modules\Order\Repositories;

use App\Modules\Order\Models\Order;

interface OrderRepositoryInterface
{
    /**
     * @param array $orderData
     * @param array $orderProductsData
     * @return Order
     */
    public function create(array $orderData,array $orderProductsData): Order;
}
