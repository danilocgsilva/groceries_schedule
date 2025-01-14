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
}
