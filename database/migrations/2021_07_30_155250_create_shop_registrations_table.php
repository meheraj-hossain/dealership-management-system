<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_registrations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->char('uniqueId');
            $table->unsignedBigInteger('ownerId');
            $table->foreign('ownerId')->references('id')->on('shopkeepers');
            $table->text('address');
            $table->unsignedBigInteger('area_id');
            $table->foreign('area_id')->references('id')->on('areas');
            $table->string('image')->nullable();
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
        Schema::dropIfExists('shop_registrations');
    }
}
