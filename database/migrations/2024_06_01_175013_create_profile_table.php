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
        Schema::create('profile', function (Blueprint $table) {
            $table->increments('id', 10);
            $table->string('title', 200);
            $table->mediumText('description');
            $table->string('img_header', 255)->default('Logo_Paroki.png')->nullable();
            $table->string('status', 10);
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
        Schema::dropIfExists('profile');
    }
};
