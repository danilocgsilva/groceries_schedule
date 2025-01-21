<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GroceryItem;
use Database\Repositories\GroceryItemRepository;
use App\Http\Requests\GroceryItemRequest;
use Symfony\Component\HttpFoundation\RedirectResponse;
use App\Http\Requests\GroceryItemUpdateRequest;

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
    public function store(GroceryItemRequest $request): RedirectResponse
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
     * Summary of update
     * 
     * @param \App\Http\Requests\GroceryItemUpdateRequest $request
     * @param \App\Models\GroceryItem $grocery_item
     * @param \Database\Repositories\GroceryItemRepository $groceryItemRepository
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function update(
        GroceryItemUpdateRequest $request, 
        GroceryItem $grocery_item, 
        GroceryItemRepository $groceryItemRepository
    ): RedirectResponse
    {
        if ($request->lasting_estimate) {
            $grocery_item->setEstimation((int) $request->lasting_estimate);
        }

        $groceryItemRepository->update($grocery_item);

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
