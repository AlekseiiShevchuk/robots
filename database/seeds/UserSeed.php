<?php

use Illuminate\Database\Seeder;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'name' => 'Admin', 'email' => 'admin@admin.com', 'password' => '$2y$10$MfyAbniULciBW229tuXCXOpQRT2uBuhSN9ExbD.NnXrV4GzQn6K.i', 'role_id' => 1, 'remember_token' => '', 'device_id' => null, 'language_id' => null,],

        ];

        foreach ($items as $item) {
            \App\User::create($item);
        }
    }
}
