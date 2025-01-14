<?php

declare(strict_types=1);

namespace Database\Repositories;

use App\Models\GroceryItem;
use App\Models\EstimateLasting;
use Illuminate\Database\Eloquent\Model;
use App\Models\ModelInterface;

class GroceryItemRepository implements RepositoryInterface
{
    /**
     * @param GroceryItem $groceryItem
     * @return \Database\Repositories\GroceryItemRepository
     */
    public function save($groceryItem): self
    {
        $groceryItem->save();
        if (($estimation = $groceryItem->getEstimation())) {
            $groceryItem->estimation()->create([
                "days" => $estimation
            ]);
        }

        return $this;
    }

    public function find(int $id): GroceryItem
    {
        return GroceryItem::find($id);
    }

    /**
     * @return array<GroceryItem>
     */
    public function all(): array
    {
        /**
         * @var array<GroceryItem>
         */
        $arrayOfGroceries = [];
        foreach (GroceryItem::all() as $item) {
            $arrayOfGroceries[] = $item;
        }
        return $arrayOfGroceries;
    }

    /**
     * @param GroceryItem $groceryItem
     * @return int
     */
    public function remove($groceryItem): bool
    {
        if (($estimationCollection = $groceryItem->estimation()->get())->count()) {
            $estimationIds = $estimationCollection->pluck('id')->toArray();
            EstimateLasting::whereIn('id', $estimationIds)->delete();
        }
        $groceryItem->delete();
        return true;
    }
}
