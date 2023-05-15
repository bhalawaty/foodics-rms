<?php

namespace Database\Factories;

use App\Modules\Ingredient\Models\IngredientProduct;
use Illuminate\Database\Eloquent\Factories\Factory;


class IngredientProductFactory extends Factory
{
    protected $model = IngredientProduct::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'product_id' => ProductFactory::class,
            'ingredient_id' => IngredientFactory::class,
            'amount_per_unit' => 10,
        ];
    }

}
