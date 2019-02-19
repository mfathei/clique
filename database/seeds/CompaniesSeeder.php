<?php

use App\Models\Company;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Seeder;

class CompaniesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('companies')->truncate();
        

        Company::create([
            'name' => 'Clique',
            'logo' => '/images/logo.png',
            'manager_id' => 2,
            'location_id' => 9,
        ]);

        Schema::enableForeignKeyConstraints();
    }
}
