<?php

declare(strict_types=1);

namespace Database\Repositories;

use App\Models\GroceryItem;
use Illuminate\Database\Eloquent\Model;
use App\Models\ModelInterface;

class GroceryItemRepository implements RepositoryInterface
{
    public function save(ModelInterface $groceryItem): self
    {
        // $groceryItem = GroceryItem::make([
        //     "name" => $request->name
        // ]);
        // $groceryItem->save();

        $groceryItem->save();

        return $this;
    }

    public function find(int $id): GroceryItem
    {
        return GroceryItem::find($id);
    }

    
}
