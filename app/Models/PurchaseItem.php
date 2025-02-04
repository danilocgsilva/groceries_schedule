<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Place;
use DateTime;
use Illuminate\Database\Eloquent\Casts\Attribute;
use App\Services\ToBladeCustomDateString;
use App\Services\CalculateNextPurchase;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PurchaseItem extends Model
{
    protected $table = "purchases_items";

    protected $fillable = [
        "grocery_item_id",
        "amount",
        "place_id"
    ];

    public function place(): BelongsTo
    {
        return $this->belongsTo(Place::class, "place_id", "id");
    }

    public function getCreatedAtDatetime(): DateTime
    {
        $dateTime = DateTime::createFromFormat("Y-m-d H:i:s", $this->created_at);
        return $dateTime;
    }

    public function grocery_item()
    {
        return $this->belongsTo(GroceryItem::class, "grocery_item_id", "id");
    }

    public function createdAtCustomBladeString(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => ToBladeCustomDateString::toString($this->created_at, $this->grocery_item->getEstimation())
        );
    }

    public function nextPurchaseString(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => CalculateNextPurchase::nextPurchaseString($this->grocery_item, $this->getCreatedAtDatetime())
        );
    }
}
