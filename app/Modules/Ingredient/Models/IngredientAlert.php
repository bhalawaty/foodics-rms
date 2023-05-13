<?php

namespace App\Modules\Ingredient\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class IngredientAlert extends Model
{

    protected $fillable = ['ingredient_id', 'stock_level'];

    public function ingredient(): BelongsTo
    {
        return $this->belongsTo(Ingredient::class);
    }
}
