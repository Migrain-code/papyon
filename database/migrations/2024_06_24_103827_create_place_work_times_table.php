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
        Schema::create('place_work_times', function (Blueprint $table) {
            $table->id();
            $table->integer('place_id');
            $table->integer('day_id');
            $table->boolean('status')->default(0)->comment('0 => pasif, 1 => aktif');
            $table->time('start_time');
            $table->time('end_time');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('place_work_times');
    }
};
