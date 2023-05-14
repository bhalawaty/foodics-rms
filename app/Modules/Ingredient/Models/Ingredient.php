<?php

namespace App\Modules\Ingredient\Models;

use App\Modules\Product\Models\Product;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Ingredient extends Model
{
    protected $fillable = [
        'name',
        'stock_level',
        'stock',
        'initial_stock',
        'minimum_stock_level'
    ];

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class)->withPivot('quantity');
    }

    /**
     *
     * @param int $value
     * @return void
     * @throws Exception
     */
    public function setStockAttribute(int $value): void
    {
        if ($this->attributes['stock'] < $value){
            throw new Exception('stock is less than order quantity');
        }
        $this->attributes['stock'] -= $value;
        $this->attributes['stock_level'] = ( $this->attributes['stock']  / $this->initial_stock) * 100;
    }
}
