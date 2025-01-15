<?php

namespace Tests\Feature\Database\Repositories;

use App\Models\GroceryItem;
use Database\Repositories\GroceryItemRepository;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\RefreshDatabaseState;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
// use Tests\Feature\Database\TestCase;
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

    /**
     * A basic feature test example.
     */
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

        $groceryItem->setName("Orange");
        $this->groceryItemRepository->update($groceryItem);

        $modelFromDatabase = $this->groceryItemRepository->find($groceryItem->id);
        $this->assertSame("Orange", $modelFromDatabase->getName());
    }

    public function testUpdateEstimates(): void
    {
        $groceryItem = (new GroceryItem())
            ->setName("Coca Cola")
            ->setEstimation(8);
        $this->groceryItemRepository->save($groceryItem);

        $groceryItem->setEstimation(12);
        $this->groceryItemRepository->update($groceryItem);
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
