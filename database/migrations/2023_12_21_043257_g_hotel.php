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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id('roomNum');
            $table->integer('price');
            $table->boolean('availability');
            $table->boolean('wifi');
            $table->boolean('gym');
            $table->boolean('breakfast');
            $table->boolean('park');
            $table->boolean('smoking');
            $table->boolean('pool');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
