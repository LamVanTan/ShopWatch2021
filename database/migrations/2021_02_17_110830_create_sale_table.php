<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSaleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sale', function (Blueprint $table) {
            $table->increments('sale_id');
            $table->integer('sale_percent');
            $table->date('sale_date_start')->nullable();
            $table->date('sale_date_end')->nullable();
            $table->integer('sale_status')->nullable();
            $table->string('sale_code')->nullable();
            $table->string('sale_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sale');
    }
}
