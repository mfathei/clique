<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

use App\Models\VacationType;

class VacationTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('vacation_types')->truncate();
        Schema::enableForeignKeyConstraints();
        
        VacationType::create([
            'name' => 'sickness'
        ]);
        
        VacationType::create([
            'name' => 'honeymoon'
        ]);
        
        VacationType::create([
            'name' => 'travelling'
        ]);
    }
}
