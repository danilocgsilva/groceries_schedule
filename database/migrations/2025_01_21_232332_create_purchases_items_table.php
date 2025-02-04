<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    const TABLE_NAME = "purchases_items";
    
    public function up(): void
    {
        Schema::create(self::TABLE_NAME, function (Blueprint $table) {
            $table->id();
            $table->biginteger("grocery_item_id")->unsigned();
            $table->integer("place_id")->unsigned()->nullable();
            $table->decimal("amount", 7, 2)->unsigned()->nullable();
            $table->timestamps();
            $table->foreign("grocery_item_id")->references("id")->on("groceries_items");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(self::TABLE_NAME);
    }
};
