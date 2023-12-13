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
        Schema::create('table_cart', function (Blueprint $table) {
            $table->id();
            $table->string('created_by')->nullable(); // user id of the costumer who added the menu into their cart.
            $table->string('image')->nullable(); // image of the menu.
            $table->string('menu_name')->nullable(); // menu name of the added menu by the user.
            $table->string('restaurant_name')->nullable(); // restaurant name of the selected menu.
            $table->string('price')->nullable(); // price of the menu added.
            $table->string('created_at')->nullable(); // date added.
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_cart');
    }
};
