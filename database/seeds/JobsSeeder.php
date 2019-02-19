<?php

use App\Models\Job;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Seeder;

class JobsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('jobs')->truncate();
        Schema::enableForeignKeyConstraints();

        Job::create([
            'code' => 'AD_PRES',
            'title' => 'President',
            'min_salary' => 20000,
            'max_salary' => 40000,
        ]);

        Job::create([
            'code' => 'AD_VP',
            'title' => 'Administration Vice President',
            'min_salary' => 15000,
            'max_salary' => 30000,
        ]);

        Job::create([
            'code' => 'AD_ASST',
            'title' => 'Administration Assistant',
            'min_salary' => 3000,
            'max_salary' => 6000,
        ]);

        Job::create([
            'code' => 'FI_MGR',
            'title' => 'Finance Manager',
            'min_salary' => 8200,
            'max_salary' => 16000,
        ]);

        Job::create([
            'code' => 'FI_ACCOUNT',
            'title' => 'Accountant',
            'min_salary' => 4200,
            'max_salary' => 9000,
        ]);

        Job::create([
            'code' => 'AC_MGR',
            'title' => 'Accounting Manager',
            'min_salary' => 8200,
            'max_salary' => 16000,
        ]);

        Job::create([
            'code' => 'AC_ACCOUNT',
            'title' => 'Public Accountant',
            'min_salary' => 4200,
            'max_salary' => 9000,
        ]);

        Job::create([
            'code' => 'SA_MAN',
            'title' => 'Sales Manager',
            'min_salary' => 10000,
            'max_salary' => 20000,
        ]);

        Job::create([
            'code' => 'SA_REP',
            'title' => 'Sales Representative',
            'min_salary' => 6000,
            'max_salary' => 12000,
        ]);

        Job::create([
            'code' => 'PU_MAN',
            'title' => 'Purchasing Manager',
            'min_salary' => 6000,
            'max_salary' => 15000,
        ]);


        Job::create([
            'code' => 'PU_CLERK',
            'title' => 'Purchasing Clerk',
            'min_salary' => 2500,
            'max_salary' => 5500,
        ]);

        Job::create([
            'code' => 'IT_PROG',
            'title' => 'Programmer',
            'min_salary' => 4000,
            'max_salary' => 15000,
        ]);
    }
}
