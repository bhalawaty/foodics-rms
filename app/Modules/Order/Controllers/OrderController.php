<?php

namespace App\Modules\Order\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Order\Requests\StoreOrderRequest;
use App\Modules\Order\Resources\OrderResource;
use App\Modules\Order\Services\OrderServiceInterface;

class OrderController extends Controller
{

    private OrderServiceInterface $orderService;

    public function __construct(OrderServiceInterface $orderService)
    {
        $this->orderService = $orderService;
    }

    /**
     * @param StoreOrderRequest $storeOrderRequest
     * @return OrderResource
     */
    public function store(StoreOrderRequest $storeOrderRequest): OrderResource
    {
        $order = $this->orderService->create($storeOrderRequest->input('products'));
        return OrderResource::make($order);
    }
}
