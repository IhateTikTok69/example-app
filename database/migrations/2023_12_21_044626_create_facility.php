<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Validation\Rules\Unique;

use function Laravel\Prompts\table;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // create_facility_table.php
    public function up()
    {
        Schema::create('facilities', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('roomNum')->index()->unique();
            $table->boolean('wifi');
            $table->boolean('gym');
            $table->boolean('breakfast');
            $table->boolean('park');
            $table->boolean('smoking');
            $table->boolean('pool');
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
        Schema::dropIfExists('facilities');
    }
};
