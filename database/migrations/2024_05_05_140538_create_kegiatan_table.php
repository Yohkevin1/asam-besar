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
        Schema::create('kegiatan', function (Blueprint $table) {
            $table->string('id', 12)->primary();
            $table->string('title', 200);
            $table->string('location', 200);
            $table->date('date');
            $table->text('description')->nullable();
            $table->string('img_header', 255)->default('Logo_Paroki.png')->nullable();
            $table->string('status', 50);
            $table->timestamps();
            $table->softDeletesDatetime('deleted_at');
            $table->foreign('img_header')->references('id')->on('img_collection');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kegiatan');
    }
};
