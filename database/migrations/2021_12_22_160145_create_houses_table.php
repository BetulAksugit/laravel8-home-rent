<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('houses', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('title',150);
            $table->string('keywords')->nullable();
            $table->string('description')->nullable();
            $table->string('image',75)->nullable();
            $table->integer('category_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->string('address',100)->nullable();
            $table->string('phone',20)->nullable();
            $table->integer('metrekare')->nullable();
            $table->string('isitma')->nullable();
            $table->integer('odasayisi')->nullable();
            $table->integer('katsayisi')->nullable();
            $table->string('esya')->nullable();
            $table->integer('binayasi')->nullable();
            $table->float('price')->nullable();
            $table->float('aidat')->nullable();
            $table->text('detail')->nullable();
            $table->string('slug',100)->nullable();
            $table->string('status',5)->nullable()->default('False');
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
        Schema::dropIfExists('houses');
    }
}
