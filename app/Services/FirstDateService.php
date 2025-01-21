<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\FirstCountDate;
use App\Models\GroceryItem;
use DateTime;
use Database\Repositories\FirstCountDateRepository;

class FirstDateService
{
    public static function setFirstDate(GroceryItem $groceryItem)
    {
        $firstCountDate = FirstCountDate::make([
            'grocery_item_id' => $groceryItem->id,
            'first_date' => new DateTime()
        ]);
        (new FirstCountDateRepository())->save($firstCountDate);
    }
}
