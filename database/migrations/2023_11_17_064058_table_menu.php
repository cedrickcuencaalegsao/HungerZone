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
        Schema::create('table_menu', function (Blueprint $table) {
            $table->bigInteger('id');
            $table->string('restaurantname')->nullable();
            $table->string('bestseller')->nullable();
            $table->string('categories')->nullable();
            $table->string('name')->nullable();
            $table->string('price')->nullable();
            $table->string('image')->nullable();
            $table->string('created_at')->nullable();
            $table->string('updated_at')->nullable();
            $table->primary(['id', 'name', 'restaurantname']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_menu');
    }
};
