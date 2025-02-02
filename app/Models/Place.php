<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    protected $fillable = [
        "name"
    ];

    public function purchase()
    {
        return $this->hasOne(Purchase::class, "purchase_id", "id");
    }
}
