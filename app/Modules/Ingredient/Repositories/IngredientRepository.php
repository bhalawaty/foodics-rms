<?php

namespace App\Modules\Ingredient\Repositories;

use App\Modules\Ingredient\Models\Ingredient;
use Illuminate\Support\Collection;

class IngredientRepository implements IngredientRepositoryInterface
{

    /**
     * @param string $column
     * @param array $values
     * @return Collection
     */
    public function getByIds(string $column, array $values): Collection
    {
        return Ingredient::whereIn($column, $values)->get();
    }

    /**
     * @param array $ingredientsConsumedStock
     * @return void
     */
    public function consumeStock(array $ingredientsConsumedStock): void
    {
        Ingredient::whereIn('id', array_keys($ingredientsConsumedStock))
            ->each(function ($ingredient) use ($ingredientsConsumedStock) {
                $ingredient->update([
                    'stock' => $ingredientsConsumedStock[$ingredient->id]
                ]);
            });
    }
}
