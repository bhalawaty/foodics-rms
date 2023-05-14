<?php

namespace App\Modules\Order\Repositories;

use App\Modules\Order\Models\Order;

class OrderRepository implements OrderRepositoryInterface
{

    /**
     * @param array $orderData
     * @param array $orderProductsData
     * @return Order
     */
    public function create(array $orderData, array $orderProductsData): Order
    {
        $order = Order::create($orderData);
        $order->products()->attach($orderProductsData);
        return $order;
    }

}
