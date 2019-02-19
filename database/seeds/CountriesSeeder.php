<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use App\Models\Country;
use Illuminate\Database\Seeder;

class CountriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('countries')->truncate();
        Schema::enableForeignKeyConstraints();
        Country::create([
            'code' => 'IT',
            'name' => 'Italy'
        ]);

        Country::create([
            'code' => 'JP',
            'name' => 'Japan'
        ]);

        Country::create([
            'code' => 'US',
            'name' => 'United States of America',
        ]);

        Country::create([
            'code' => 'CA',
            'name' => 'Canada',
        ]);

        Country::create([
            'code' => 'CN',
            'name' => 'China',
        ]);

        Country::create([
            'code' => 'IN',
            'name' => 'India',
        ]);

        Country::create([
            'code' => 'AU',
            'name' => 'Australia',
        ]);

        Country::create([
            'code' => 'ZW',
            'name' => 'Zimbabwe',
        ]);

        Country::create([
            'code' => 'SG',
            'name' => 'Singapore',
        ]);

        Country::create([
            'code' => 'UK',
            'name' => 'United Kingdom',
        ]);

        Country::create([
            'code' => 'FR',
            'name' => 'UFrance',
        ]);

        Country::create([
            'code' => 'DE',
            'name' => 'Germany',
        ]);

        Country::create([
            'code' => 'ZM',
            'name' => 'Zambia',
        ]);

        Country::create([
            'code' => 'EG',
            'name' => 'Egypt',
        ]);

        Country::create([
            'code' => 'BR',
            'name' => 'Brazil',
        ]);

        Country::create([
            'code' => 'CH',
            'name' => 'Switzerland',
        ]);

        Country::create([
            'code' => 'NL',
            'name' => 'Netherlands',
        ]);

        Country::create([
            'code' => 'MX',
            'name' => 'Mexico',
        ]);

        Country::create([
            'code' => 'KW',
            'name' => 'Kuwait',
        ]);
    }
}
