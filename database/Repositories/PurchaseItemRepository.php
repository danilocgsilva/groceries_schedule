<?php

declare(strict_types=1);

namespace Database\Repositories;

use Illuminate\Database\Eloquent\Model;
use App\Models\PurchaseItem;

class PurchaseItemRepository implements RepositoryInterface
{
    /**
     * @param \App\Models\PurchaseItem $purchase
     * @return \Database\Repositories\PurchaseItemRepository
     */
    public function save(Model $purchase): static
    {
        $purchase->save();
        return $this;
    }

    public function find(int $id): PurchaseItem
    {
        return PurchaseItem::find($id);
    }

    /**
     * @return array<\App\Models\PurchaseItem>
     */
    public function all(): array
    {
        /**
         * @var array<\App\Models\PurchaseItem>
         */
        $arrayOfPurchases = [];
        foreach (PurchaseItem::all() as $item) {
            $arrayOfPurchases[] = $item;
        }
        return $arrayOfPurchases;
    }

    /**
     * @param \App\Models\PurchaseItem $purchaseItem
     * @return int
     */
    public function remove(Model $purchaseItem): bool
    {
        $purchaseItem->delete();
        return true;
    }

    /**
     * @param \App\Models\PurchaseItem $purchaseItem
     * @return void
     */
    public function update(Model $purchaseItem): void
    {
        $purchaseItem->save();
    }
}
