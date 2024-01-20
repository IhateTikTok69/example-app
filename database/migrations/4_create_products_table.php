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
        Schema::create('products', function (Blueprint $table) {
            $table->id('product_id');
            $table->string('item_name');
            $table->integer('price');
            $table->longText('item_desc')->nullable();
            $table->unsignedBigInteger('cat_id')->index()->nullable();
            $table->unsignedBigInteger('sub_cat_id')->index()->nullable();
            $table->integer('weight');
            $table->integer('height');
            $table->integer('width');
            $table->integer('length');
            $table->integer('stock');
            $table->string('prevImg')->nullable();
            $table->timestamps();

            $table->foreign('cat_id')->references('cat_id')->on('categories');
            $table->foreign('sub_cat_id')->references('sub_cat_id')->on('sub_categories')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
