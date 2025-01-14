<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GroceryItem extends Model implements ModelInterface
{
    protected $table = 'groceries_items';

    protected $fillable = [
        'name'
    ];

    public function estimation()
    {
        return $this->hasMany(EstimateLasting::class, "grocery_item_id", "id");
    }
}
