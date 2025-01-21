<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * The estimation for how long an item grocery will lasts after its purchase.
 */
class EstimateLasting extends Model
{
    protected $table = 'estimate_lasting';

    protected $fillable = [
        'days'
    ];

    public function groceryItem()
    {
        return $this->belongsTo(GroceryItem::class, "grocery_item_id", "id");
    }
}
