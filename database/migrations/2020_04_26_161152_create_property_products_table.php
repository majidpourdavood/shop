<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertyProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property_products', function (Blueprint $table) {
            $table->id();
            $table->text('value')->nullable();
//            $table->string('price')->nullable();

            $table->bigInteger('property_id')->unsigned()->nullable();
            $table->foreign('property_id')->references('id')->on('properties');

            $table->bigInteger('option_property_id')->unsigned()->nullable();
            $table->foreign('option_property_id')->references('id')->on('option_properties');

//            $table->bigInteger('key_value_id')->unsigned()->nullable();
//            $table->foreign('key_value_id')->references('id')->on('key_values');

            $table->integer('product_id')->unsigned()->nullable();
            $table->foreign('product_id')->references('id')->on('products');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('property_products');
    }
}
