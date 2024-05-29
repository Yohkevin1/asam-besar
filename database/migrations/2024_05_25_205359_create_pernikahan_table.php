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
        Schema::create('pernikahan', function (Blueprint $table) {
            $table->string('id', 12)->primary();
            $table->string('title', 200);
            $table->dateTime('post_date');
            $table->dateTime('end_date');
            $table->mediumText('description');
            $table->string('foto', 255);
            $table->string('status', 10);
            $table->timestamps();
            $table->softDeletesDatetime('deleted_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pernikahan');
    }
};
