<?php

declare(strict_types=1);

namespace Tests\Feature\Database\Repositories;

use App\Models\GroceryItem;
use Database\Repositories\GroceryItemRepository;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use DB;

class GroceryItemRepositoryTest extends TestCase
{
    use DatabaseMigrations;

    private GroceryItemRepository $groceryItemRepository;

    protected static $initialized = false;

    public function setUp(): void
    {
        parent::setUp();
        if (!self::$initialized) {
            self::$initialized = true;
        }
        $this->groceryItemRepository = new GroceryItemRepository();
    }

    public function testSave(): void
    {
        $this->assertCount(0, DB::table("groceries_items")->get());
        $groceryItem = (new GroceryItem())->setName("Gloves");
        $this->groceryItemRepository->save($groceryItem);
        $this->assertCount(1, DB::table("groceries_items")->get());
    }

    public function testSaveWithEstimates(): void
    {
        $this->assertCount(0, DB::table("groceries_items")->get());
        $this->assertCount(0, DB::table("estimate_lasting")->get());
        $groceryItem = (new GroceryItem())
            ->setName("Gloves")
            ->setEstimation(5);

        $this->groceryItemRepository->save($groceryItem);
        $this->assertCount(1, DB::table("groceries_items")->get());
        $this->assertCount(1, DB::table("estimate_lasting")->get());
    }

    public function testKeepKeyAfterSave(): void
    {
        $groceryItem = (new GroceryItem())
            ->setName("Milk")
            ->setEstimation(4);
        $this->groceryItemRepository->save($groceryItem);
        $this->assertSame(1, $groceryItem->id);
    }

    public function testFind(): void
    {
        $groceryItem = (new GroceryItem())
            ->setName("Milk")
            ->setEstimation(4);
        $this->groceryItemRepository->save($groceryItem);
        $groceryId = $groceryItem->id;
        
        $recoveredModel = $this->groceryItemRepository->find($groceryId);

        $this->assertSame($groceryId, $recoveredModel->id);
    }

    public function testUpdateInDatabase(): void
    {
        $groceryItem = (new GroceryItem())
            ->setName("Chocolate")
            ->setEstimation(8);
        $this->groceryItemRepository->save($groceryItem);
        $this->assertCount(1, DB::table("groceries_items")->get());

        $groceryItem->setName("Orange");
        $this->groceryItemRepository->update($groceryItem);

        $modelFromDatabase = $this->groceryItemRepository->find($groceryItem->id);
        $this->assertSame("Orange", $modelFromDatabase->getName());
        $this->assertCount(1, DB::table("groceries_items")->get());
    }

    public function testUpdateEstimates(): void
    {
        $groceryItem = (new GroceryItem())
            ->setName("Coca Cola")
            ->setEstimation(8);
        $this->groceryItemRepository->save($groceryItem);

        $groceryItem->setEstimation(12);
        $this->groceryItemRepository->update($groceryItem);

        /*
        The estimate_lasting table will now have two entries. Each time a user changes the
        lasting data from the item grocery a new entry is created. Actually, a new entry is
        created when the item grocery is first created with a lasting data (that is optional,
        by the day). If happens a change to the lasting data to this same grocery item, then
        it is created a new entry for the lasting data, so the old data stay on dataabse. This
        is important to keep track of the changes of lasting. With such data, it is possible
        to make calculations about the evolution of the needs.
        */
        $this->assertCount(2, DB::table("estimate_lasting")->get());
    }

    public function testUpdateAndGetUpdatedEstimation(): void
    {
        $groceryItem = (new GroceryItem())
            ->setName("Coca Cola")
            ->setEstimation(8);
        $this->groceryItemRepository->save($groceryItem);

        $groceryItem->setEstimation(12);
        $this->groceryItemRepository->update($groceryItem);

        $recoveredFromDatabaseModel = $this->groceryItemRepository->find($groceryItem->id);
        $this->assertSame(12, $recoveredFromDatabaseModel->getEstimation());
    }
}
