<?php

namespace App\Modules\Ingredient\Repositories;

use Illuminate\Support\Collection;

interface IngredientRepositoryInterface
{
    /**
     * @param string $column
     * @param array $values
     * @return Collection
     */
    public function getByIds(string $column, array $values): Collection;

    /**
     * @param array $ingredientsConsumedStock
     * @return void
     */
    public function consumeStock(array $ingredientsConsumedStock): void;
}
