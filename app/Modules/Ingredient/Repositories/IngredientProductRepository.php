<?php

namespace App\Modules\Ingredient\Repositories;

use App\Modules\Ingredient\Models\IngredientProduct;
use Illuminate\Support\Collection;

class IngredientProductRepository implements IngredientProductRepositoryInterface
{

    /**
     * @param string $column
     * @param array $values
     * @return Collection
     */
    public function getByIds(string $column, array $values): Collection
    {
        return IngredientProduct::whereIn($column, $values)->get();
    }
}
