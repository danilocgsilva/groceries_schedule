<?php

declare(strict_types=1);

namespace Tests\Feature\Database\Repositories;

use Tests\TestCase;
use App\Models\GroceryItem;
use PHPUnit\Framework\Attributes\Test;
use Database\Repositories\GroceryItemRepository;
use App\Services\FirstDateService;
use App\Models\FirstCountDate;
use Database\Repositories\FirstCountDateRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FirstCountDateRepositoryTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function find(): void
    {
        $groceryItem = GroceryItem::make([
            "name" => "Bread"
        ]);
        (new GroceryItemRepository())->save($groceryItem);
        FirstDateService::setFirstDate($groceryItem);
        $recoveredFirstDate = (new FirstCountDateRepository())->find(1);
        $this->assertInstanceOf(FirstCountDate::class, $recoveredFirstDate);
    }
}
