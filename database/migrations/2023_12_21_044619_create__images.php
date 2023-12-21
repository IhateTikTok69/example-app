<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // create_images_table.php
    public function up()
    {
        Schema::create('_images', function (Blueprint $table) {
            $table->id('imgID');
            $table->string('path')->nullable();
            $table->unsignedBigInteger('roomNum');
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('roomNum')->references('roomNum')->on('rooms')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_images');
    }
};
