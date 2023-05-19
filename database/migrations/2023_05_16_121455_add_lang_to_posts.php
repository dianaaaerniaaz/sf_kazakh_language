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
        Schema::table('posts', function (Blueprint $table) {
            $table->string('title_kz')->nullable();
            $table->string('title_en')->nullable();
            $table->string('title_ru')->nullable();
            $table->text('content_kz')->nullable();
            $table->text('content_en')->nullable();
            $table->text('content_ru')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn('title_kz');
            $table->dropColumn('title_en');
            $table->dropColumn('title_ru');
            $table->dropColumn('content_kz');
            $table->dropColumn('content_en');
            $table->dropColumn('content_ru');

        });
    }
};
