<?php

declare(strict_types=1);

namespace Tests\Feature\Services;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use DB;
use Tests\TestCase;
use Database\Repositories\GroceryItemRepository;

class FirstDataServiceTest extends TestCase
{
    use DatabaseMigrations;

    public function testSetFirstDate(): void
    {
        $this->assertCount(0, DB::table("first_count_date")->get());
    }
}
