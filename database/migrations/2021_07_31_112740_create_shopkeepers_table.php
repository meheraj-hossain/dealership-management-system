<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopkeepersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shopkeepers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('areaManagerId');
            $table->foreign('areaManagerId')->references('id')->on('users');
            $table->string('name');
            $table->date('date');
            $table->char('nid');
            $table->string('email')->unique();
            $table->char('phone');
            $table->string('image')->nullable();
            $table->text('address');
            $table->enum('status',['Active','Inactive'])->default('Inactive');
            $table->enum('shop_assigned',['No','Yes'])->default('No');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shopkeepers');
    }
}
