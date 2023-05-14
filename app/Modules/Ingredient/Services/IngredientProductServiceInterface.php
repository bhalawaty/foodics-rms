<?php

namespace App\Modules\Ingredient\Services;

use Illuminate\Support\Collection;

interface IngredientProductServiceInterface
{
    /**
     * @param string $column
     * @param array $values
     * @return Collection
     */
    public function getByIds(string $column, array $values): Collection;

    /**
     * @param array $orderData
     * @return array
     */
    public function calculateIngredientAmountPerOrder(array $orderData): array;
}
