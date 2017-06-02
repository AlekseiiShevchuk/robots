<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1496390347LanguagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('languages')) {
            Schema::create('languages', function (Blueprint $table) {
                $table->increments('id');
                $table->string('abbreviation');
                $table->string('name');
                $table->tinyInteger('is_active_for_admin')->default(0);
                $table->tinyInteger('is_active_for_users')->default(0);
                $table->string('flag_image')->nullable();
                
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
        Schema::dropIfExists('languages');
    }
}
