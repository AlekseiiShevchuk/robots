<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1496391875LocalizedMapsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('localized_maps')) {
            Schema::create('localized_maps', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('map_id')->unsigned()->nullable();
                $table->foreign('map_id', '41871_593120c3416c0')->references('id')->on('maps')->onDelete('cascade');
                $table->integer('language_id')->unsigned()->nullable();
                $table->foreign('language_id', '41871_593120c345162')->references('id')->on('languages')->onDelete('cascade');
                $table->string('title');
                $table->string('description')->nullable();
                $table->string('sound_description')->nullable();
                
                $table->timestamps();
                
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('localized_maps');
    }
}
