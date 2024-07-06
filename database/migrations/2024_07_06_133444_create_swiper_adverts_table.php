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
        Schema::create('swiper_adverts', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('place_id');
            $table->string('image')->nullable();
            $table->boolean('status')->default(0)->comment('1=>active');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('swiper_adverts');
    }
};
