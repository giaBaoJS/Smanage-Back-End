<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateToursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tours', function (Blueprint $table) {
            $table->increments('id_tour');
            $table->foreignId('id_schedule');
            $table->string('name_tour',255);
            $table->integer('rate');
            $table->string('time',255);
            $table->double('price', 10, 0);
            $table->double('price_children', 10, 0);
            $table->string('url_img_tour',255);
            $table->double('discount', 10, 0)->default(0);
            $table->tinyInteger('status')->default(0);
            $table->integer('quantity_limit');
            $table->date('date_start');
            $table->date('date_end');
            $table->string('vehicle',255);
            $table->string('url_gallery_tours',2000);
            $table->string('short_content',2000);
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
        Schema::dropIfExists('tours');
    }
}
