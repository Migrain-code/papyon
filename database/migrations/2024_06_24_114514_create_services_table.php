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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('place_id');
            $table->boolean('call_a_waiter')->default(false);
            $table->boolean('request_account')->default(false);
            $table->boolean('call_a_valet')->default(false);
            $table->string('valet_phone')->nullable();
            $table->boolean('call_a_taxi')->default(false);
            $table->string('taxi_phone')->nullable();
            $table->boolean('take_away_order')->default(false);
            $table->string('take_away_phone')->nullable();
            $table->boolean('package_order')->default(false);
            $table->string('package_order_phone')->nullable();
            $table->decimal('delivery_fee', 8, 2)->nullable();
            $table->timestamps();

            $table->foreign('place_id')->references('id')->on('places')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
