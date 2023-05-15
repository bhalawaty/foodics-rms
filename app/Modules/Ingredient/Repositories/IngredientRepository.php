<?php

namespace App\Modules\Ingredient\Repositories;

use App\Modules\Ingredient\Models\Ingredient;
use Exception;
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
     * @throws Exception
     */
    public function consumeStock(array $ingredientsConsumedStock): void
    {
        Ingredient::whereIn('id', array_keys($ingredientsConsumedStock))
            ->each(function ($ingredient) use ($ingredientsConsumedStock) {
                $consumedStock = $ingredientsConsumedStock[$ingredient->id];
                if ($ingredient->stock < $consumedStock) {
                    throw new Exception('stock is less than order quantity');
                }
                $newStock = $ingredient->stock - $consumedStock;
                $newStockLevel = ($newStock / $ingredient->initial_stock) * 100;
                $ingredient->update([
                    'stock' => $newStock,
                    'stock_level' => $newStockLevel,
                ]);
            });
    }
}
