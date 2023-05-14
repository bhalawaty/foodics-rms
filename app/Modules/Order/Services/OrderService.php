<?php

namespace App\Modules\Order\Services;

use App\Modules\Ingredient\Services\IngredientProductServiceInterface;
use App\Modules\Ingredient\Services\IngredientServiceInterface;
use App\Modules\Order\Models\Order;
use App\Modules\Order\Repositories\OrderRepositoryInterface;
use App\Modules\Product\Services\ProductServiceInterface;
use Exception;
use Illuminate\Support\Facades\DB;

class OrderService implements OrderServiceInterface
{

    private IngredientProductServiceInterface $ingredientProductService;
    private IngredientServiceInterface $ingredientService;
    private OrderRepositoryInterface $repository;
    private ProductServiceInterface $productService;

    public function __construct(ProductServiceInterface $productService, IngredientProductServiceInterface $ingredientProductService, IngredientServiceInterface $ingredientService, OrderRepositoryInterface $orderRepository)
    {
        $this->ingredientProductService = $ingredientProductService;
        $this->ingredientService = $ingredientService;
        $this->repository = $orderRepository;
        $this->productService = $productService;
    }

    /**
     * @param array $data
     * @return Order
     * @throws Exception
     */
    public function create(array $data): Order
    {
        try {
            $ingredientAmountPerOrder = $this->ingredientProductService->calculateIngredientAmountPerOrder($data);
            DB::beginTransaction();
            $this->ingredientService->consumeStock($ingredientAmountPerOrder);
            $orderProductsData = $this->getOrderProductsData(collect($data)->pluck('product_id')->toArray(), $data);
            $order = $this->repository->create(['total_cost' => $this->getTotalPrice($data)], $orderProductsData);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
        }
        return $order;
    }

    /**
     * @param array $orderData
     * @return mixed
     */
    public function getTotalPrice(array $orderData): mixed
    {
        return collect($orderData)->sum(function ($product) {
            return $this->productService->find($product['product_id'])->price * $product['quantity'];
        });
    }

    /**
     * @param array $productIds
     * @param array $orderData
     * @return array
     */
    public function getOrderProductsData(array $productIds, array $orderData): array
    {
        $products = $this->productService->getByIds($productIds, ['id', 'price'])->keyBy('id');
        $orderItems = [];
        foreach ($orderData as $productData) {
            $product = $products->get($productData['product_id']);
            $orderItems[$product->id] = [
                'quantity' => $productData['quantity'],
                'total_amount' => $product->price * $productData['quantity'],
            ];
        }
        return $orderItems;
    }

}
