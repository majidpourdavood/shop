<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();

            $table->boolean('status')->default(true)->nullable();
            $table->string('name')->nullable();
            $table->string('key')->nullable();
            $table->boolean('type')->default(false)->nullable();
            $table->boolean('show_place')->default(false)->nullable();

            $table->bigInteger('head_property_id')->unsigned()->nullable();
            $table->foreign('head_property_id')->references('id')->on('head_properties');

            $table->integer('cate_id')->unsigned()->nullable();
            $table->foreign('cate_id')->references('id')->on('categories');

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
        Schema::dropIfExists('properties');
    }
}
