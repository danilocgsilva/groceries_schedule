<?php

namespace Tests\Feature\Controllers;

use Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;

class GroceryItemControllerTest extends TestCase
{
    #[Test]
    public function redirectFromRoot(): void
    {
        $response = $this->get("/")->assertRedirect("schedule");
    }

    #[Test]
    public function createForm(): void
    {
        $this->get("grocery_items/create")->assertSuccessful();
    }

    #[Test]
    public function index(): void
    {
        $this->get("grocery_items")->assertSuccessful();
    }

    #[Test]
    public function notExists(): void
    {
        $this->get("grocery_items/999999")->assertNotFound();
    }
}
