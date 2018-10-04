<?php

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
        $this->call(UsersTableSeeder::class);
        $this->call(CountriesSeeder::class);
        $this->call(LocationsSeeder::class);
        $this->call(CompaniesSeeder::class);
        $this->call(DepartmentsSeeder::class);
        $this->call(JobsSeeder::class);
        $this->call(RolesSeeder::class);
        $this->call(EmployeesSeeder::class);
    }
}
