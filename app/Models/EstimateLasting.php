<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
