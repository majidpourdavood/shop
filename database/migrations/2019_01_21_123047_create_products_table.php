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
            $table->increments('id');
            $table->string('title')->nullable();
            $table->string('slug')->nullable();
            $table->text('images')->nullable();
//            $table->string('price', 25)->nullable();
            $table->text('meta_description')->nullable();
            $table->text('body')->nullable();
            $table->boolean('active')->default(false)->nullable();

//            $table->string('stock', 25)->nullable();
//            $table->string('stock_shop', 25)->nullable();
//            $table->tinyInteger('post_work_day')->nullable();
            $table->string('code', 25)->nullable();
//            $table->string('discount', 25)->nullable();
            $table->tinyInteger('type')->default(0)->nullable();
            $table->text('details')->nullable();
            $table->bigInteger('viewCount')->nullable();

            $table->integer('cate_id')->unsigned();
            $table->foreign('cate_id')->references('id')->on('categories');

            $table->bigInteger('brand_id')->unsigned()->nullable();
            $table->foreign('brand_id')->references('id')->on('brands');

            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users');

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
        Schema::dropIfExists('products');
    }
}
