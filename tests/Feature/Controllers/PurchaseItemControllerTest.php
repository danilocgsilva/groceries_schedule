<?php

declare(strict_types=1);

namespace Tests\Feature\Controllers;

use Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PurchaseItemControllerTest extends TestCase
{
    use RefreshDatabase;
    
    #[Test]
    public function listPurchase(): void
    {
        $response = $this->get("/purchase_items");
        $response->assertSuccessful();
    }

    #[Test]
    public function listPurchaseView(): void
    {
        $response = $this->get("/purchase_items");
        $response->assertViewIs('Purchase.index');
    }

    #[Test]
    public function listPurchaseEmpty(): void
    {
        $response = $this->get("/purchase_items");
        $response->assertSee("Still there's no entries registered!", false);
    }
}
