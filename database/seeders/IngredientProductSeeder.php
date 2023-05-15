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
        $product = Product::factory()->create();
        $ingredients = Ingredient::factory()->count(3)->create();
        foreach ($ingredients as $ingredient) {
            IngredientProduct::factory()->create([
                'product_id' => $product->id,
                'ingredient_id' => $ingredient->id,
            ]);
        }
    }
}
