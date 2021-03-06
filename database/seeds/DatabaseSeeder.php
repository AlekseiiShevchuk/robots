<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        if (\App\Role::all()->first() == null) {
            $this->call(RoleSeed::class);
        }
        if (\App\User::all()->first() == null) {
            $this->call(UserSeed::class);
        }
        if (\App\Language::all()->first() == null) {
            $this->call(LanguagesSeed::class);
        }
        if (\App\Action::all()->first() == null) {
            $this->call(ActionsSeeder::class);
        }

    }
}
