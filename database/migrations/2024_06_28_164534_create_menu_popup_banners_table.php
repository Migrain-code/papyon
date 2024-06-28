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
        Schema::create('menu_popup_banners', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('menu_id');
            $table->tinyInteger('banner_type')->default(1)->comment('1 => text and image');
            $table->longText('description')->nullable();
            $table->string('image')->nullable();
            $table->boolean('status')->default(0)->comment('1=> active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menu_popup_banners');
    }
};
