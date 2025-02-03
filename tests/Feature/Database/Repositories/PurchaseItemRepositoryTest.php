<?php

declare(strict_types=1);

use Database\Repositories\PurchaseItemRepository;
use Tests\TestCase;
use App\Models\PurchaseItem;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use PDOException;

class PurchaseItemRepositoryTest extends TestCase
{
    use DatabaseMigrations;

    private PurchaseItemRepository $purchaseRepository;

    public function setUp(): void
    {
        parent::setUp();
        $this->purchaseRepository = new PurchaseItemRepository();
    }
    
    public function testSaveMissingRelation()
    {
        $this->expectException(PDOException::class);
        $this->assertCount(0, DB::table("purchases")->get());
        $purchase = PurchaseItem::make([
            "grocery_item_id" => 1,
            "amount" => 4,
            "place_id" => 5
        ]);
        $this->purchaseRepository->save($purchase);
        $this->assertCount(1, DB::table("purchases")->get());
    }
}

