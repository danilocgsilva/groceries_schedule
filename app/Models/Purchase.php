<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $table = "purchases";

    protected $fillable = [
        "grocery_item_id",
        "amount",
        "place_id"
    ];
}
