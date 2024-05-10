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
        Schema::create('pengumuman', function (Blueprint $table) {
            $table->string('id', 12)->primary();
            $table->string('title', 200);
            $table->date('post_date');
            $table->date('end_date');
            $table->text('description');
            $table->unsignedInteger('id_kegiatan')->nullable();
            $table->string('img_header', 255)->default('Logo_Paroki.png');
            $table->timestamps();
            $table->softDeletesDatetime('deleted_at');
            $table->foreign('id_kegiatan')->references('id')->on('kegiatan');
            $table->foreign('img_header')->references('id')->on('img_collection');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengumuman');
    }
};
