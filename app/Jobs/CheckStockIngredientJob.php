<?php

namespace App\Jobs;

use App\Mail\LowIngredientEmail;
use App\Modules\Ingredient\Models\Ingredient;
use App\Modules\Ingredient\Models\IngredientAlert;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class CheckStockIngredientJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private Ingredient $ingredient;

    /**
     * Create a new message instance.
     *
     * @param Ingredient $ingredient
     */
    public function __construct(Ingredient $ingredient)
    {
        $this->ingredient = $ingredient;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        if ($this->ingredient->stock_level < $this->ingredient->minimum_stock_level && IngredientAlert::where('ingredient_id', $this->ingredient->id)->doesntExist()) {
            $email = new LowIngredientEmail($this->ingredient);
            Mail::to(config('mail.from.address'))->send($email);
            IngredientAlert::create([
                'ingredient_id' => $this->ingredient->id,
                'stock_level' => $this->ingredient->stock_level,
            ]);
        }
    }
}
