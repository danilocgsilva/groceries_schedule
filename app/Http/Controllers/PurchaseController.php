<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Database\Repositories\PurchaseRepository;
use Illuminate\Contracts\View\View;
use App\Http\Requests\PurchaseRequest;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Database\Repositories\GroceryItemRepository;
use App\Models\Purchase;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the groceries.
     */
    public function index(PurchaseRepository $purchaseRepository): View
    {
        return view('Purchase.index', [
            'purchasesHistory' => $purchaseRepository->all()
        ]);
    }

    /**
     * @param PurchaseRepository $purchaseRepository
     * @return void
     */
    public function create(GroceryItemRepository $groceryItemRepository): View
    {
        return view('Purchase.create', [
            'groceriesItems' => $groceryItemRepository->all()
        ]);
    }

    public function store(
        PurchaseRequest $purchaseRequest, 
        PurchaseRepository $purchaseRepository
    ): RedirectResponse
    {
        $newPurchase = Purchase::make($purchaseRequest->toArray());
        $purchaseRepository->save($newPurchase);
        
        return redirect(route("purchase.index"))
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
