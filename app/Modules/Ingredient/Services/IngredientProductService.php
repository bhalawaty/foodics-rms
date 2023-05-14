<?php

namespace App\Modules\Ingredient\Services;

use App\Modules\Ingredient\Repositories\IngredientProductRepositoryInterface;
use Illuminate\Support\Collection;

class IngredientProductService implements IngredientProductServiceInterface
{
    private IngredientProductRepositoryInterface $repository;

    public function __construct(IngredientProductRepositoryInterface $ingredientProductRepository)
    {
        $this->repository = $ingredientProductRepository;
    }

    /**
     * @param string $column
     * @param array $values
     * @return Collection
     */
    public function getByIds(string $column, array $values): Collection
    {
        return $this->repository->getByIds($column, $values);
    }

    /**
     * @param array $orderData
     * @return array
     * sum all amount of ingredient that will be reduced by multiply the amount with the quantity of the product
     */
    public function calculateIngredientAmountPerOrder(array $orderData): array
    {
        $productIds = collect($orderData)->pluck('product_id')->toArray();
        return $this->getByIds('product_id', $productIds)->mapWithKeys(function ($ingredient) use ($orderData) {
            $productQuantity = collect($orderData)->where('product_id', $ingredient->product_id)->pluck('quantity')->first();
            return [$ingredient->ingredient_id => $ingredient->amount_per_unit * $productQuantity];
        })->toArray();
    }
}
