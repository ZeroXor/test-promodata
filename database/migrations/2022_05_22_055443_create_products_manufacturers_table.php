<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsManufacturersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_manufacturers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->index('product_id');
            $table->index('manufacturer_id');
            $table->timestamps();
            $table->unique(['product_id', 'manufacturer_id']);
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->foreignId('manufacturer_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products_manufacturers');
    }
}
