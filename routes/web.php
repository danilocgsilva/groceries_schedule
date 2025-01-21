<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GroceryItemController;
use App\Http\Controllers\FirstCountDateController;
use Symfony\Component\HttpFoundation\RedirectResponse;

Route::get('/', function (): RedirectResponse {
    return redirect(route('schedule'));
});

Route::resource("grocery_items", GroceryItemController::class);
Route::get("grocery_items/{grocery_item}/delete", [GroceryItemController::class, 'delete'])
    ->name("grocery_items.delete");

Route::get("schedule", fn () => view("schedule"))
    ->name("schedule");

Route::post("set_first_date/{grocery_item}", [FirstCountDateController::class, "setFirstDate"])
    ->name("set_first_date");
