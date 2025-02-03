<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Database\Repositories\PlaceRepository;
use Database\Repositories\PurchaseItemRepository;
use Illuminate\Contracts\View\View;
use App\Http\Requests\PurchaseRequest;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Database\Repositories\GroceryItemRepository;
use App\Models\PurchaseItem;

class PurchaseItemController extends Controller
{
    /**
     * Display a listing of the groceries.
     */
    public function index(PurchaseItemRepository $purchaseRepository): View
    {
        return view('PurchaseItem.index', [
            'purchasesHistory' => $purchaseRepository->all()
        ]);
    }

    /**
     * @param PurchaseItemRepository $purchaseRepository
     * @return void
     */
    public function create(
        GroceryItemRepository $groceryItemRepository,
        PlaceRepository $placeRepository,
    ): View
    {
        return view('PurchaseItem.create', [
            'groceriesItems' => $groceryItemRepository->all(),
            'places' => $placeRepository->all()
        ]);
    }

    public function store(
        PurchaseRequest $purchaseRequest, 
        PurchaseItemRepository $purchaseRepository
    ): RedirectResponse
    {
        $newPurchase = PurchaseItem::make($purchaseRequest->toArray());
        $purchaseRepository->save($newPurchase);
        
        return redirect(route("purchase_items.index"))
            ->with("just_happened_event_info", "Purchase has just been created.");
    }

    public function show()
    {

    }

    public function update()
    {

    }

    public function destroy()
    {

    }

    public function edit()
    {
        
    }
}
