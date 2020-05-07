<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {

            $table->increments('id');
            $table->boolean('active')->default(false);
            $table->string('name')->nullable();
            $table->string('lastName')->nullable();
            $table->string('mobile')->unique()->nullable();
            $table->string('username')->unique()->nullable();
            $table->string('email')->nullable();
            $table->string('password')->nullable();
            $table->string('code')->nullable();
            $table->datetime('expireCode')->nullable();
            $table->text('description')->nullable();
            $table->dateTime('dateBirth')->nullable();
            $table->string('userCode')->nullable();
            $table->string('phoneHome')->nullable();
            $table->string('image')->nullable();
            $table->text('address')->nullable();
            $table->string('nationalCode',10)->unique()->nullable();
            $table->string('postalCode')->nullable();
            $table->boolean('gender')->default(false);


            $table->integer('location')->unsigned()->nullable();
            $table->foreign('location')->references('id')->on('locations');

            $table->text('token')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
        Schema::dropIfExists('chart_user');

    }
}
