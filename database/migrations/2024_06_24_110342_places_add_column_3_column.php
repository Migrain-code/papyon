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
        Schema::table('places', function (Blueprint $table) {
            $table->integer('theme_id')->default(1)->after('user_id');
            $table->dropColumn('whatsapp');
            $table->string('latitude')->nullable()->after('instagram');
            $table->string('longitude')->nullable()->after('instagram');
            $table->longText('maps_embed')->nullable()->after('instagram');
            $table->longText('address')->nullable()->after('instagram');
            $table->tinyText('main_language')->after('instagram');
            $table->json('other_languages')->nullable()->after('instagram');
            $table->string('price_type')->after('instagram');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('places', function (Blueprint $table) {
            //
        });
    }
};
