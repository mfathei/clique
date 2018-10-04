<?php

use App\Models\Department;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Seeder;

class DepartmentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('departments')->truncate();

        Department::create(
            [
                'name' => 'HR',
                'company_id' => 1,
                'manager_id' => 5,
                'location_id' => 9,
            ]
        );

        Department::create(
            [
                'name' => 'Sales',
                'company_id' => 1,
                'manager_id' => 4,
                'location_id' => 10,
            ]
        );

        Department::create(
            [
                'name' => 'Executive',
                'company_id' => 1,
                'manager_id' => 2,
                'location_id' => 9,
            ]
        );

        Schema::enableForeignKeyConstraints();
    }
}
