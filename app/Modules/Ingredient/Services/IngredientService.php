<?php

namespace App\Modules\Ingredient\Services;

use App\Modules\Ingredient\Repositories\IngredientRepositoryInterface;
use Illuminate\Support\Collection;

class IngredientService implements IngredientServiceInterface
{
    private IngredientRepositoryInterface $repository;

    public function __construct(IngredientRepositoryInterface $ingredientRepository)
    {
        $this->repository = $ingredientRepository;
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
     * @param array $ingredientsConsumedStock
     * @return void
     */
    public function consumeStock(array $ingredientsConsumedStock): void
    {
        $this->repository->consumeStock($ingredientsConsumedStock);
    }

}
