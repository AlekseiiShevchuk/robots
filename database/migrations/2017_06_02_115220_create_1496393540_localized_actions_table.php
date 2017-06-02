<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1496393540LocalizedActionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('localized_actions')) {
            Schema::create('localized_actions', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('language_id')->unsigned()->nullable();
                $table->foreign('language_id', '41879_5931274447b5b')->references('id')->on('languages')->onDelete('cascade');
                $table->integer('action_id')->unsigned()->nullable();
                $table->foreign('action_id', '41879_593127444a9f2')->references('id')->on('actions')->onDelete('cascade');
                $table->string('name');
                $table->string('sound')->nullable();
                
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
        Schema::dropIfExists('localized_actions');
    }
}
