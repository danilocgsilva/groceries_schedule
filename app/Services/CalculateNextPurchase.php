<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\GroceryItem;
use App\Models\PurchaseItem;
use DateTime;

class CalculateNextPurchase
{
    public static function nextPurchaseString(GroceryItem $groceryItem, DateTime $lastPurchaseDatetime): string
    {
        $nextDateToPurchase = clone $lastPurchaseDatetime;
        $nextDateToPurchase->modify("+{$groceryItem->getEstimation()} day");
        return $nextDateToPurchase->format("Y-m-d");
    }
}
