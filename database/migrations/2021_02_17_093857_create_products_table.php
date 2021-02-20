<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('products_id');
            $table->string('products_name');
            $table->integer('products_price');
            $table->integer('products_quantity');
            $table->string('products_origin');
            $table->string('products_diameter');
            $table->string('products_thickness');
            $table->string('products_bracelet');
            $table->string('products_case');
            $table->string('products_crystal');
            $table->string('products_machine');
            $table->integer('products_status');
            $table->longText('products_detail');
            $table->date('products_datetime');
            $table->integer('cat_id')->unsigned();
            $table->integer('sale_id')->nullable();
            $table->foreign('cat_id')->references('cat_id')->on('category')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
