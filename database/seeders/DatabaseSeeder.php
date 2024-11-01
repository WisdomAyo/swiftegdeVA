<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Seeders\UsersTableSeeder;
use Database\Seeders\WorldCitiesLocaleTableSeeder;
use Database\Seeders\WorldCitiesTableSeeder;
use Illuminate\Database\Seeder;
//use UsersTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        // \App\Models\User::factory(10)->create();

        // $this->call([
        //     WorldCitiesLocaleTableSeeder::class,
        //     WorldCitiesTableSeeder::class,
        //     WorldCitiesTablesSeeder::class,
        //     // Add other seeders here
        // ]);
    }
}
