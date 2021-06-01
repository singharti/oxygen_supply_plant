<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking_history', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('consumer_id');
            $table->foreign('consumer_id')->references('id')->on('users');
            $table->unsignedBigInteger('supplier_id');
            $table->foreign('supplier_id')->references('id')->on('users');
            $table->enum('covid_19', ['positive', 'negative'])->default('negative');
            $table->date('date_covid_19')->nullable();
            $table->enum('status', ['pending', 'process','delivered'])->default('pending');
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
        Schema::dropIfExists('booking_history');
    }
}
