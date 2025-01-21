<?php

declare(strict_types=1);

namespace Tests\Feature\Services;

use App\Models\FirstCountDate;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;
use App\Models\GroceryItem;
use Database\Repositories\GroceryItemRepository;
use App\Services\FirstDateService;
use Database\Repositories\FirstCountDateRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;

class FirstDateServiceTest extends TestCase
{
    use RefreshDatabase;

    private GroceryItemRepository $groceryItemRepository;

    public function setUp(): void
    {
        parent::setUp();
        $this->groceryItemRepository = new GroceryItemRepository();
    }

    #[Test]
    public function setFirstDate(): void
    {
        $this->assertCount(0, DB::table("first_count_date")->get());

        /**
         * @var \App\Models\GroceryItem
         */
        $groceryItem = $this->createGroceryInDatabase("Coffee");

        FirstDateService::setFirstDate($groceryItem);
        $this->assertCount(1, DB::table("first_count_date")->get());
    }

    #[Test]
    public function getGroceryFromFirstDate(): void
    {
        /** @var \App\Models\GroceryItem */
        $groceryItem = $this->createGroceryInDatabase("Coffee");

        FirstDateService::setFirstDate($groceryItem);
        
        /** @var \App\Models\FirstCountDate */
        $recoveredFirstDateFromGrocery = (new FirstCountDateRepository())->find($groceryItem->id);
        $groceryFetched = $recoveredFirstDateFromGrocery->groceryItem;
        $this->assertInstanceOf(GroceryItem::class, $groceryFetched);
    }

    #[Test]
    public function getFirstDateFromGrocery(): void
    {
        /** @var \App\Models\GroceryItem */
        $groceryItem = $this->createGroceryInDatabase("Sugar");
        FirstDateService::setFirstDate($groceryItem);
        $this->assertInstanceOf(FirstCountDate::class, $groceryItem->firstCountDate);
    }

    #[Test]
    public function setFirstDateMustUpdatedInsteadOfAddNew(): void
    {
        /** @var \App\Models\GroceryItem */
        $groceryItem = $this->createGroceryInDatabase("Milk 1L");
        FirstDateService::setFirstDate($groceryItem);
        $this->assertCount(1, DB::table("first_count_date")->get());
        FirstDateService::setFirstDate($groceryItem);
        $this->assertCount(1, DB::table("first_count_date")->get());
    }

    private function createGroceryInDatabase(string $groceryItemName): GroceryItem
    {
        $groceryItem = GroceryItem::make([
            "name" => $groceryItemName
        ]);
        $this->groceryItemRepository->save($groceryItem);
        return $groceryItem;
    }
}
