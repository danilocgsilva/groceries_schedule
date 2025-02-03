<?php

declare(strict_types=1);

use App\Http\Controllers\PlaceController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GroceryItemController;
use App\Http\Controllers\FirstCountDateController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use App\Http\Controllers\PurchaseItemController;

Route::get('/', function (): RedirectResponse {
    return redirect(route('schedule'));
});

Route::resource("grocery_items", GroceryItemController::class);
Route::resource("purchase", PurchaseItemController::class);
Route::resource("place", PlaceController::class);
Route::get("grocery_items/{grocery_item}/delete", [GroceryItemController::class, 'delete'])
    ->name("grocery_items.delete");

Route::get("schedule", fn () => view("schedule"))
    ->name("schedule");

Route::post("set_first_date/{grocery_item}", [FirstCountDateController::class, "setFirstDate"])
    ->name("set_first_date");
