<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bill', function (Blueprint $table) {
            $table->increments('id_bill');
            $table->foreignId('id_tour');
            $table->foreignId('id_user');
            $table->integer('quantity_adults');
            $table->integer('quantity_children');
            $table->double('total_price', 10, 0);
            $table->tinyInteger('status')->default(0);
            $table->string('PTTT',255);
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
        Schema::dropIfExists('bill');
    }
}
