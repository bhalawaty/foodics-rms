<?php

namespace App\Modules\Ingredient\Repositories;

interface IngredientProductRepositoryInterface
{
    public function getByIds(string $column, array $values);
}
