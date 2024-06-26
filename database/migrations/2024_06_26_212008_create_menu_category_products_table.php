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
        Schema::create('menu_category_products', function (Blueprint $table) {
            $table->id();
            $table->string('menu_id');
            $table->string('category_id');
            $table->string('name');
            $table->longText('description')->nullable();
            $table->string('image')->nullable();
            $table->double('price', 10, 2);
            $table->string('calorie_total')->nullable();
            $table->tinyInteger('spicy')->nullable();
            $table->json('allergens')->nullable();
            $table->boolean('status')->default(true)->comment('1 => active');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menu_category_products');
    }
};
