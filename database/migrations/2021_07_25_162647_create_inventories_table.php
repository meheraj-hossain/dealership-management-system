<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum('inventory_type',['Beverages','Snacks']);
            $table->unsignedBigInteger('category_id');
            $table->string('name');
            $table->text('details');
            $table->unsignedBigInteger('size_id');
            $table->string('image')->nullable();
            $table->unsignedBigInteger('type_id');
            $table->unsignedBigInteger('flavor_id');
            $table->decimal('price_per_carton');
            $table->decimal('quantity');
            $table->decimal('total_price');
            $table->enum('status',['Active','Inactive'])->default('Active');

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
        Schema::dropIfExists('inventories');
    }
}
