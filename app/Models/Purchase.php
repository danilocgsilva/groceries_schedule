<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Place;

class Purchase extends Model
{
    protected $table = "purchases";

    protected $fillable = [
        "grocery_item_id",
        "amount",
        "place_id"
    ];

    public function place()
    {
        return $this->belongsTo(Place::class, "place_id", "id");
    }
}
