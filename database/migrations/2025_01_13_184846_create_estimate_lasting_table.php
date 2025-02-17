<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create("estimate_lasting", function (Blueprint $table) {
            $table->id();
            $table->integer("days");
            $table->biginteger("grocery_item_id")->unsigned();
            $table->timestamps();
            $table->foreign("grocery_item_id")->references("id")->on("groceries_items");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("estimate_lasting");
    }
};
