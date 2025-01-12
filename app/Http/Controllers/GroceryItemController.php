<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GroceryItem;

class GroceryItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('GroceryItem.index', [
            'groceriesItems' => GroceryItem::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('GroceryItem.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string'
        ]);
        GroceryItem::create(['name' => $request->name]);
        return redirect(route('grocery_itens.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(GroceryItem $grocery_item)
    {
        return view('GroceryItem.show', [
            'groceryItem' => $grocery_item
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    public function delete(GroceryItem $grocery_item)
    {
        return view(
            'GroceryItem.delete',
            [
                'groceryItem' => $grocery_item
            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GroceryItem $grocery_item)
    {
        $grocery_item->delete();
        return redirect(route('grocery_itens.index'));
    }
}
