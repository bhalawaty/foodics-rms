<?php

namespace Database\Seeders;

use App\Modules\Ingredient\Models\Ingredient;
use App\Modules\Ingredient\Models\IngredientProduct;
use App\Modules\Product\Models\Product;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class IngredientProductSeeder extends Seeder
{

    protected Faker $faker;

    public function __construct(Faker $faker)
    {
        $this->faker = $faker;
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $product =  Product::create([
            'name' => $this->faker->word(),
            'price' => $this->faker->numberBetween(100, 1000),
            'created_at'=> now()->subDays(rand(0, 30)),
            'updated_at'=> now()->subDays(rand(0, 30)),
        ])->latest()->first();

        // Create at least three ingredients for each product
       Ingredient::insert([
            [
                'name' => $this->faker->word(),
                'stock_level' => 100,
                'initial_stock' => 5000,
                'minimum_stock_level' => 50,
                'stock' => 5000,
            ],
            [
                'name' => $this->faker->word(),
                'stock_level' => 100,
                'initial_stock' => 5000,
                'minimum_stock_level' => 50,
                'stock' => 5000,
            ],
            [
                'name' => $this->faker->word(),
                'stock_level' => 100,
                'initial_stock' => 5000,
                'minimum_stock_level' => 50,
                'stock' => 5000,
            ]

        ]);

        $ingredientProduct=[];
        foreach (Ingredient::all() as $ingredient) {
            $ingredientProduct[] = [
                'product_id' => $product->id,
                'ingredient_id' => $ingredient->id,
                'amount_per_unit' => $this->faker->numberBetween(1, 10),
            ];
        }

        IngredientProduct::insert($ingredientProduct);
    }
}
