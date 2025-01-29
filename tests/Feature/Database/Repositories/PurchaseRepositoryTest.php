<?php

declare(strict_types=1);

use Database\Repositories\PurchaseRepository;
use Tests\TestCase;
use App\Models\Purchase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use PDOException;

class PurchaseRepositoryTest extends TestCase
{
    use DatabaseMigrations;

    private PurchaseRepository $purchaseRepository;

    public function setUp(): void
    {
        parent::setUp();
        $this->purchaseRepository = new PurchaseRepository();
    }
    
    public function testSaveMissingRelation()
    {
        $this->expectException(PDOException::class);
        $this->assertCount(0, DB::table("purchases")->get());
        $purchase = Purchase::make([
            "grocery_item_id" => 1,
            "amount" => 4,
            "place_id" => 5
        ]);
        $this->purchaseRepository->save($purchase);
        $this->assertCount(1, DB::table("purchases")->get());
    }
}

