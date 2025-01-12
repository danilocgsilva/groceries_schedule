<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GroceryItemController;

Route::get('/', function () {
    return redirect(route('schedule'));
});

Route::resource('grocery_items', GroceryItemController::class);
Route::get('grocery_items/{grocery_item}/delete', [GroceryItemController::class, 'delete'])->name('grocery_items.delete');

Route::get('schedule', fn () => view('schedule'))->name('schedule');
