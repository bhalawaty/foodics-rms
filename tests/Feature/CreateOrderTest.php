<?php

namespace Tests\Feature;

use App\Modules\Ingredient\Models\Ingredient;
use App\Modules\Ingredient\Models\IngredientProduct;
use App\Modules\Product\Models\Product;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateOrderTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_created_order_successfully(): void
    {
        $product = $this->createProductWithIngredients();
        $response = $this->post('/api/orders', [
            "products" =>
                [
                    [
                        "product_id" => $product->id,
                        "quantity" => 1
                    ]
                ]

        ]);

        $response->assertStatus(201);
    }

    public function test_stock_consumed_correctly(): void
    {
        $product = $this->createProductWithIngredients();
        $this->post('/api/orders', [
            "products" =>
                [
                    [
                        "product_id" => $product->id,
                        "quantity" => 1
                    ]
                ]

        ]);
        $this->assertDatabaseHas(Ingredient::class, [
            'stock' => 4990,
            'stock_level' => 99.80,
        ]);

    }

    /**
     * @return Collection|Model
     */
    public function createProductWithIngredients(): Collection|Model
    {
        $product = Product::factory()->create();
        $ingredients = Ingredient::factory()->count(3)->create();
        foreach ($ingredients as $ingredient) {
            IngredientProduct::factory()->create([
                'product_id' => $product->id,
                'ingredient_id' => $ingredient->id,
            ]);
        }
        return $product;
    }
}
