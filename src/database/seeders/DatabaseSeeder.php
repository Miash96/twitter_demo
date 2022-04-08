<?php

namespace Database\Seeders;

use App\Models\Twitt;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(100)->create();

        for ($i = 0; $i < 10; $i++){
            $this->call([
                TwittsSeeder::class
            ]);
        }


        //Twitter::factory(100)->create();
        // \App\Models\User::factory(10)->create();
    }
}
