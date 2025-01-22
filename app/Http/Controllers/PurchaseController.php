<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Database\Repositories\GroceryItemRepository;
use App\Http\Requests\PurchaseRequest;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the groceries.
     */
    public function index(): View
    {
        return view('Purchase.index', [
            'purchasesHistory' => []
        ]);
    }

    /**
     * @param GroceryItemRepository $groceryItemRepository
     * @return void
     */
    public function create(GroceryItemRepository $groceryItemRepository): View
    {
        return view('Purchase.create', [
            'groceriesItems' => $groceryItemRepository->all()
        ]);
    }

    public function store(PurchaseRequest $purchaseRequest)
    {
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
