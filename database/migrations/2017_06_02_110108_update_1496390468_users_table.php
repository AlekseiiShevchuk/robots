<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1496390468UsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('device_id')->nullable();
                $table->integer('language_id')->unsigned()->nullable();
                $table->foreign('language_id', '41868_59311b44733dd')->references('id')->on('languages')->onDelete('cascade');
                
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('device_id');
            $table->dropForeign('41868_59311b44733dd');
            $table->dropIndex('41868_59311b44733dd');
            $table->dropColumn('language_id');
            
        });

    }
}
