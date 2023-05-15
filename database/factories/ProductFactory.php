<?php

namespace Database\Factories;

use App\Modules\Product\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;


class ProductFactory extends Factory
{
    protected $model = Product::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'price' => $this->faker->numberBetween(100, 1000),
            'created_at'=> now(),
            'updated_at'=> now(),
        ];
    }

}
