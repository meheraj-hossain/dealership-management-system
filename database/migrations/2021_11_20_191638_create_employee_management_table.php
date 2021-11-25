<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeManagementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_management', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('employee_id');
            $table->foreign('employee_id')->references('id')->on('area_managers');
            $table->string('month');
            $table->decimal('salary')->nullable();
            $table->decimal('bonus')->nullable();
            $table->decimal('commission')->nullable();
            $table->enum('is_approved',['Yes','No'])->default('No');
            $table->enum('is_paid',['Yes','No'])->default('No');
            $table->date('payment_date')->nullable();
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
        Schema::dropIfExists('employee_management');
    }
}
