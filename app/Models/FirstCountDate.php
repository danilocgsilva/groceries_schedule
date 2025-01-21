<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class FirstCountDate extends Model
{
    protected $table = "first_count_date";

    protected $fillable = [
        "grocery_item_id",
        "first_date"
    ];

    public function groceryItem(): HasOne
    {
        return $this->hasOne(GroceryItem::class, "id", "grocery_item_id");
    }
}
