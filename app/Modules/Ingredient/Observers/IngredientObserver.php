<?php

namespace App\Modules\Ingredient\Observers;

use App\Jobs\CheckStockIngredientJob;
use App\Mail\LowIngredientEmail;
use App\Modules\Ingredient\Models\Ingredient;
use Illuminate\Support\Facades\Mail;

class IngredientObserver
{

    /**
     * Handle events after all transactions are committed.
     *
     * @var bool
     */
    public bool $afterCommit = true;

    /**
     * Handle the Ingredient "created" event.
     *
     * @param Ingredient $ingredient
     * @return void
     */
    public function updated(Ingredient $ingredient): void
    {
        CheckStockIngredientJob::dispatch($ingredient);
    }

}
