<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

use App\Models\Vacation;

class VacationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('vacations')->truncate();

        Vacation::create([
            'employee_id' => 1,
            'type' => 1,
            'reason' => null,
            'start_date' => '2018-10-2',
            'end_date' => '2018-10-3',
            'approved_by' => 1,
            'approved_at' => '2018-10-2',
            'notes' => null
        ]);

        Vacation::create([
            'employee_id' => 2,
            'type' => 1,
            'reason' => null,
            'start_date' => '2018-10-7',
            'end_date' => '2018-10-7',
            'approved_by' => 1,
            'approved_at' => '2018-10-7',
            'notes' => null
        ]);

        Vacation::create([
            'employee_id' => 2,
            'type' => 1,
            'reason' => null,
            'start_date' => '2018-10-9',
            'end_date' => '2018-10-9',
            'approved_by' => 1,
            'approved_at' => '2018-10-9',
            'notes' => null
        ]);

        Schema::enableForeignKeyConstraints();
    }
}
