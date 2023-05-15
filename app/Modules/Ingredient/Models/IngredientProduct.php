<?php

namespace App\Modules\Ingredient\Models;

use Database\Factories\IngredientProductFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IngredientProduct extends Model
{
    use HasFactory;

    /**
     * Create a new factory instance for the model.
     */
    protected static function newFactory(): IngredientProductFactory
    {
        return IngredientProductFactory::new();
    }

    protected $table = 'ingredient_product';

    protected $fillable = ['quantity'];

}
