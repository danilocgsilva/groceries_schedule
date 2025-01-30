<?php

declare(strict_types=1);

namespace Database\Repositories;

use Illuminate\Database\Eloquent\Model;
use App\Models\Purchase;

class PurchaseRepository implements RepositoryInterface
{
    /**
     * @param \App\Models\Purchase $purchase
     * @return \Database\Repositories\PurchaseRepository
     */
    public function save(Model $purchase): static
    {
        $purchase->save();
        return $this;
    }

    public function find(int $id): Purchase
    {
        return Purchase::find($id);
    }

    /**
     * @return array<\App\Models\Purchase>
     */
    public function all(): array
    {
        /**
         * @var array<\App\Models\Purchase>
         */
        $arrayOfPurchases = [];
        foreach (Purchase::all() as $item) {
            $arrayOfPurchases[] = $item;
        }
        return $arrayOfPurchases;
    }

    /**
     * @param \App\Models\Purchase $purchase
     * @return int
     */
    public function remove(Model $purchase): bool
    {
        $purchase->delete();
        return true;
    }

    /**
     * @param \App\Models\Purchase $purchase
     * @return void
     */
    public function update(Model $purchase): void
    {
        $purchase->save();
    }
}
