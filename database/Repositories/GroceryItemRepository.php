<?php

declare(strict_types=1);

namespace Database\Repositories;

use App\Models\GroceryItem;
use App\Models\EstimateLasting;
use Illuminate\Database\Eloquent\Model;

class GroceryItemRepository implements RepositoryInterface
{
    /**
     * @param \App\Models\GroceryItem $groceryItem
     * @return \Database\Repositories\GroceryItemRepository
     */
    public function save(Model $groceryItem): static
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
     * @return array<\App\Models\GroceryItem>
     */
    public function all(): array
    {
        /**
         * @var array<GroceryItem>
         */
        $arrayOfGroceries = [];
        foreach (GroceryItem::orderBy("name", "asc")->get()->all() as $item) {
            $arrayOfGroceries[] = $item;
        }
        return $arrayOfGroceries;
    }

    /**
     * @param GroceryItem $groceryItem
     * @return int
     */
    public function remove(Model $groceryItem): bool
    {
        if (($estimationCollection = $groceryItem->estimation()->get())->count()) {
            $estimationIds = $estimationCollection->pluck('id')->toArray();
            EstimateLasting::whereIn('id', $estimationIds)->delete();
        }
        $groceryItem->delete();
        return true;
    }

    /**
     * @param GroceryItem $groceryItem
     * @return void
     */
    public function update(Model $groceryItem): void
    {
        if (($estimation = $groceryItem->getEstimation())) {
            $groceryItem->estimation()->create([
                "days" => $estimation
            ]);
        }
        
        $groceryItem->save();
    }
}
