<?php

namespace Database\Seeders;

use App\Models\CurrencyRate;
use Illuminate\Database\Seeder;

class CurrencyRatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $currencyRates = [
            ['currency_code' => 'USD', 'conversion_rate' => 411.57],
            ['currency_code' => 'NGN', 'conversion_rate' => 1],
            ['currency_code' => 'GBP', 'conversion_rate' => 565.91],
            ['currency_code' => 'EUR', 'conversion_rate' => 487.86],
            // Add more conversion rates as needed
        ];

        foreach ($currencyRates as $rate) {
            CurrencyRate::create($rate);
        }
    }
}
