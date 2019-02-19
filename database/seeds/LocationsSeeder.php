<?php

use App\Models\Location;
use App\Models\Country;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class LocationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('locations')->truncate();
        Schema::enableForeignKeyConstraints();
        Location::create([
            'street_address' => '1297 Via Cola di Rie',
            'postal_code' => '00989',
            'city' => 'Roma',
            'state_province' => null,
            'country_id' => Country::where('code', 'IT')->first()->id,
        ]);

        Location::create([
            'street_address' => '93091 Calle della Testa',
            'postal_code' => '10934',
            'city' => 'Venice',
            'state_province' => null,
            'country_id' => Country::where('code', 'IT')->first()->id,
        ]);

        Location::create([
            'street_address' => '2017 Shinjuku-ku',
            'postal_code' => '1689',
            'city' => 'Tokyo',
            'state_province' => 'Tokyo Prefecture',
            'country_id' => Country::where('code', 'JP')->first()->id,
        ]);

        Location::create([
            'street_address' => '9450 Kamiya-cho',
            'postal_code' => '6823',
            'city' => 'Hiroshima',
            'state_province' => null,
            'country_id' => Country::where('code', 'JP')->first()->id,
        ]);

        Location::create([
            'street_address' => '2014 Jabberwocky Rd',
            'postal_code' => '26192',
            'city' => 'Southlake',
            'state_province' => 'Texas',
            'country_id' => Country::where('code', 'US')->first()->id,
        ]);

        Location::create([
            'street_address' => '2011 Interiors Blvd',
            'postal_code' => '99236',
            'city' => 'South San Francisco',
            'state_province' => 'California',
            'country_id' => Country::where('code', 'US')->first()->id,
        ]);

        Location::create([
            'street_address' => '2007 Zagora St',
            'postal_code' => '50090',
            'city' => 'South Brunswick',
            'state_province' => 'New Jersey',
            'country_id' => Country::where('code', 'US')->first()->id,
        ]);

        Location::create([
            'street_address' => '2004 Charade Rd',
            'postal_code' => '98199',
            'city' => 'Seattle',
            'state_province' => 'Washington',
            'country_id' => Country::where('code', 'US')->first()->id,
        ]);

        Location::create([
            'street_address' => '147 Spadina Ave',
            'postal_code' => 'M5V 2L7',
            'city' => 'Toronto',
            'state_province' => 'Ontario',
            'country_id' => Country::where('code', 'CA')->first()->id,
        ]);

        Location::create([
            'street_address' => '6092 Boxwood St',
            'postal_code' => 'YSW 9T2',
            'city' => 'Whitehorse',
            'state_province' => 'Yukon',
            'country_id' => Country::where('code', 'CA')->first()->id,
        ]);

        Location::create([
            'street_address' => '40-5-12 Laogianggen',
            'postal_code' => '190518',
            'city' => 'Beijing',
            'state_province' => null,
            'country_id' => Country::where('code', 'CN')->first()->id,
        ]);

/**
        INSERT INTO locations VALUES(
            2100,
            '1298 Vileparle (E)',
            '490231',
            'Bombay',
            'Maharashtra',
            'IN'
        );
        INSERT INTO locations VALUES(
            2200,
            '12-98 Victoria Street',
            '2901',
            'Sydney',
            'New South Wales',
            'AU'
        );
        INSERT INTO locations VALUES(
            2300,
            '198 Clementi North',
            '540198',
            'Singapore',
            null,
            'SG'
        );
        INSERT INTO locations VALUES(
            2400,
            '8204 Arthur St',
            null,
            'London',
            null,
            'UK'
        );
        INSERT INTO locations VALUES(
            2500,
            'Magdalen Centre, The Oxford Science Park',
            'OX9 9ZB',
            'Oxford',
            'Oxford',
            'UK'
        );
        INSERT INTO locations VALUES(
            2600,
            '9702 Chester Road',
            '09629850293',
            'Stretford',
            'Manchester',
            'UK'
        );
        INSERT INTO locations VALUES(
            2700,
            'Schwanthalerstr. 7031',
            '80925',
            'Munich',
            'Bavaria',
            'DE'
        );
        INSERT INTO locations VALUES(
            2800,
            'Rua Frei Caneca 1360 ',
            '01307-002',
            'Sao Paulo',
            'Sao Paulo',
            'BR'
        );
        INSERT INTO locations VALUES(
            2900,
            '20 Rue des Corps-Saints',
            '1730',
            'Geneva',
            'Geneve',
            'CH'
        );
        INSERT INTO locations VALUES(
            3000,
            'Murtenstrasse 921',
            '3095',
            'Bern',
            'BE',
            'CH'
        );
        INSERT INTO locations VALUES(
            3100,
            'Pieter Breughelstraat 837',
            '3029SK',
            'Utrecht',
            'Utrecht',
            'NL'
        );
        INSERT INTO locations VALUES(
            3200,
            'Mariano Escobedo 9991',
            '11932',
            'Mexico City',
            'Distrito Federal,',
            'MX'
        );
*/
    }
}
