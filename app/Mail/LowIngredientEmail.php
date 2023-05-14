<?php

namespace App\Mail;

use App\Modules\Ingredient\Models\Ingredient;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class LowIngredientEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The Ingredient instance.
     *
     * @var Ingredient
     */
    public Ingredient $ingredient;

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
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.ingredient_alert')
            ->subject('Low Ingredient')
            ->with([
                'ingredientName' => $this->ingredient->name,
                'stockLevel' => $this->ingredient->stock_level,
                'minimumStockLevel' => $this->ingredient->minimum_stock_level
            ]);
    }
}
