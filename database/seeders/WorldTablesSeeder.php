<?php

namespace Database\Seeders;

use Database\Seeders\WorldCitiesLocaleTableSeeder;
use Database\Seeders\WorldCitiesTableSeeder;
use Database\Seeders\WorldCitiesTableSeederFive;
use Database\Seeders\WorldCitiesTableSeederFour;
use Database\Seeders\WorldCitiesTableSeederOne;
use Database\Seeders\WorldCitiesTableSeederSix;
use Database\Seeders\WorldCitiesTableSeederThree;
use Database\Seeders\WorldCitiesTableSeederTwo;
use Database\Seeders\WorldContinentsLocaleTableSeeder;
use Database\Seeders\WorldContinentsTableSeeder;
use Database\Seeders\WorldCountriesLocaleTableSeeder;
use Database\Seeders\WorldCountriesTableSeeder;
use Database\Seeders\WorldDivisionsLocaleTableSeeder;
use Database\Seeders\WorldDivisionsTableSeeder;
use Database\Seeders\WorldLanguagesTableSeeder;
use Illuminate\Database\PostgresConnection;
use Illuminate\Database\Seeder;
use Illuminate\Database\SQLiteConnection;
use Illuminate\Support\Facades\DB;

class WorldTablesSeeder extends Seeder
{
    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        if (\DB::connection() instanceof SQLiteConnection) {
            \DB::statement('PRAGMA FOREIGN_KEYS=0');
        } elseif (\DB::connection() instanceof PostgresConnection) {
            \DB::statement("SET session_replication_role = 'replica';");
        } else {
            \DB::statement('SET FOREIGN_KEY_CHECKS=0');
        }

		ini_set('memory_limit', '512M');//allocate memory
        \DB::disableQueryLog();//disable log

        $this->call(WorldContinentsTableSeeder::class);
        $this->call(WorldContinentsLocaleTableSeeder::class);
        $this->call(WorldCountriesTableSeeder::class);
        $this->call(WorldCountriesLocaleTableSeeder::class);
        $this->call(WorldDivisionsTableSeeder::class);
        $this->call(WorldDivisionsLocaleTableSeeder::class);
        $this->call(WorldCitiesTableSeeder::class);
		$this->call(WorldCitiesTableSeederOne::class);
		$this->call(WorldCitiesTableSeederTwo::class);
		$this->call(WorldCitiesTableSeederThree::class);
		$this->call(WorldCitiesTableSeederFour::class);
		$this->call(WorldCitiesTableSeederFive::class);
		$this->call(WorldCitiesTableSeederSix::class);
        $this->call(WorldCitiesLocaleTableSeeder::class);
        $this->call(WorldLanguagesTableSeeder::class);

        if (\DB::connection() instanceof SQLiteConnection) {
            \DB::statement('PRAGMA FOREIGN_KEYS=1');
        } elseif (\DB::connection() instanceof PostgresConnection) {
            \DB::statement("SET session_replication_role = 'origin';");
        } else {
            \DB::statement('SET FOREIGN_KEY_CHECKS=1');
        }
    }
}
