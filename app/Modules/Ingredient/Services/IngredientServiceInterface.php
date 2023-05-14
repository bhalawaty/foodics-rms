<?php

namespace App\Modules\Ingredient\Services;

use Illuminate\Support\Collection;

interface IngredientServiceInterface
{
    /**
     * @param string $column
     * @param array $values
     * @return Collection
     */
    public function getByIds(string $column , array $values): Collection;

    /**
     * @param array $ingredientsConsumedStock
     * @return void
     */
    public function consumeStock(array $ingredientsConsumedStock): void;
}
