<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1495615223SettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('settings')) {
            Schema::create('settings', function (Blueprint $table) {
                $table->string('value_name');
                $table->string('value')->nullable();
                $table->enum('type', ["string","number"]);
                
            });
        }

        //add start data
        $items = [

            ['value_name' => 'minimum_required_build_for_ios_apps', 'value' => 333, 'type' => 'number',],
            ['value_name' => 'minimum_required_build_for_android_apps', 'value' => 777, 'type' => 'number',],

        ];

        foreach ($items as $item) {
            \App\Setting::create($item);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
