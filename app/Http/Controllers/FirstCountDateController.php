<?php

namespace App\Http\Controllers;

use App\Models\GroceryItem;
use Illuminate\Http\Request;
use App\Services\FirstDateService;

class FirstCountDateController extends Controller
{
    public function setFirstDate(GroceryItem $grocery_item)
    {
        FirstDateService::setFirstDate($grocery_item);
        return redirect(route("grocery_items.show", ["grocery_item" => $grocery_item->id]))
            ->with("just_happened_event_info", "The grocery item {$grocery_item->getName()} has received the first date data.");
    }
}
