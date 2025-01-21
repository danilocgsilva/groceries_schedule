<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GroceryItem;
use Database\Repositories\GroceryItemRepository;
use App\Http\Requests\GroceryItemRequest;

class GroceryItemController extends Controller
{
    private GroceryItemRepository $groceryItemRepository;
    
    public function __construct()
    {
        $this->groceryItemRepository = new GroceryItemRepository();
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('GroceryItem.index', [
            'groceriesItems' => $this->groceryItemRepository->all()
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
    public function store(GroceryItemRequest $request)
    {
        $groceryItem = (new GroceryItem())
            ->setName($request->name)
            ->setEstimation((int) $request->lasting_estimate);

        $this->groceryItemRepository->save($groceryItem);

        return redirect(route("grocery_items.index"))
            ->with("just_happened_event_info", "The grocery item {$request->name} has just been crearted.");
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
    public function edit(GroceryItem $grocery_item)
    {
        return view('GroceryItem.edit', [
            'groceryItem' => $grocery_item
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, GroceryItem $grocery_item)
    {
        $grocery_item->update([
            'name' => $request->name
        ]);
        
        return redirect(route("grocery_items.show", [
            'grocery_item' => $grocery_item->id
        ]));
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
        $this->groceryItemRepository->remove($grocery_item);
        
        return redirect(route('grocery_items.index'));
    }
}
