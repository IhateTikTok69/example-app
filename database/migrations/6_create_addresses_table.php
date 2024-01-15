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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id("addr_id");
            $table->unsignedBigInteger('user_id')->index();
            $table->unsignedBigInteger('city_id')->index();
            $table->unsignedBigInteger('country_id')->index();
            $table->string('zipcode');
            $table->string('address_line');
            $table->timestamps();

            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
            $table->foreign('city_id')->references('city_id')->on('cities');
            $table->foreign('country_id')->references('country_id')->on('countries');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
