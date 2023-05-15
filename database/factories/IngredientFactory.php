<?php

namespace Database\Factories;

use App\Modules\Ingredient\Models\Ingredient;
use Illuminate\Database\Eloquent\Factories\Factory;


class IngredientFactory extends Factory
{
    protected $model = Ingredient::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word(),
            'stock_level' => 100,
            'initial_stock' => 5000,
            'minimum_stock_level' => 50,
            'stock' => 5000,
        ];
    }

}
