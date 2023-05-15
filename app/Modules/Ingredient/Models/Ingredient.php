<?php

namespace App\Modules\Ingredient\Models;

use App\Modules\Product\Models\Product;
use Database\Factories\IngredientFactory;
use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Ingredient extends Model
{
    use HasFactory;

    /**
     * Create a new factory instance for the model.
     */
    protected static function newFactory(): IngredientFactory
    {
        return IngredientFactory::new();
    }

    protected $fillable = [
        'name',
        'stock_level',
        'initial_stock',
        'minimum_stock_level',
        'stock',
    ];

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class)->withPivot('quantity');
    }
}
