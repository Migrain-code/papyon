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
        Schema::create('souces', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('place_id');
            $table->string('name');
            $table->boolean('status')->default(1)->comment("1=>active");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('souces');
    }
};
