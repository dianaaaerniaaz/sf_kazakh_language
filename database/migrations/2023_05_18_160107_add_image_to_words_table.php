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
        Schema::table('words', function (Blueprint $table) {
            $table->string('img')->default('noimg');
            $table->string('translation_kz')->nullable();
            $table->string('translation_en')->nullable();
            $table->string('translation_ru')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('words', function (Blueprint $table) {
            $table->dropColumn('translation_kz');
            $table->dropColumn('translation_en');
            $table->dropColumn('translation_ru');
            $table->dropColumn('image');
        });
    }
};
