<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create5936c3a2c173bActionMapTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('action_map')) {
            Schema::create('action_map', function (Blueprint $table) {
                $table->integer('action_id')->unsigned()->nullable();
                $table->foreign('action_id', 'fk_p_41872_41870_map_acti_5936c3a2c1831')->references('id')->on('actions')->onDelete('cascade');
                $table->integer('map_id')->unsigned()->nullable();
                $table->foreign('map_id', 'fk_p_41870_41872_action_m_5936c3a2c18ab')->references('id')->on('maps')->onDelete('cascade');
                
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
        Schema::dropIfExists('action_map');
    }
}
