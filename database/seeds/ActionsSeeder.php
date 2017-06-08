<?php

use Illuminate\Database\Seeder;

class ActionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = ['go Up', 'go Down', 'go Left', 'go Right'];

        foreach ($items as $item){
            \App\Action::create(['name' => $item]);
        }
    }
}
