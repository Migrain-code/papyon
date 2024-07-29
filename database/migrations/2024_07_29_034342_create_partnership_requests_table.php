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
        Schema::create('partnership_requests', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('company_age')->nullable();
            $table->string('city_id')->nullable();
            $table->string('customer_count')->nullable();
            $table->string('goal_customer_count')->nullable();
            $table->string('other_company')->nullable();
            $table->longText('note')->nullable();
            $table->boolean('status')->default(0)->comment('1 => answered');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('partnership_requests');
    }
};
