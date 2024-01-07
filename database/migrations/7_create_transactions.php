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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id('trans_id');
            $table->unsignedBigInteger('product_id')->index();
            $table->unsignedBigInteger('user_id')->index();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('receipt_id')->nullable()->unique();
            $table->float('bill');
            $table->string('status');
            $table->dateTime('completed_at')->nullable();
            $table->timestamps();

            // Foreign Key for 'roomNum'
            $table->foreign('product_id')->references('product_id')->on('products');

            // Foreign Key for 'user_id'
            $table->foreign('user_id')->references('user_id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
