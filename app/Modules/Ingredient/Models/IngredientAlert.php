<?php

namespace App\Modules\Ingredient\Models;

use Illuminate\Database\Eloquent\Model;

class IngredientAlert extends Model
{

    protected $fillable = ['ingredient_id', 'stock_level'];

}
