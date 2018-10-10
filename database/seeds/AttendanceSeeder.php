<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

use App\Models\Attendance;

class AttendanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('attendances')->truncate();

        Attendance::create([
            'date' => '2018-10-1',
            'employee_id' => 1,
            'check_in' => '2018-10-1 08:00:00',
            'check_out' => '2018-10-1 04:10:00',
            'type' => 1,
        ]);

        Attendance::create([
            'date' => '2018-10-3',
            'employee_id' => 1,
            'check_in' => '2018-10-3 08:00:00',
            'check_out' => '2018-10-3 04:00:00',
            'type' => 1,
        ]);

        Attendance::create([
            'date' => '2018-10-4',
            'employee_id' => 1,
            'check_in' => '2018-10-4 08:00:00',
            'check_out' => '2018-10-4 04:00:00',
            'type' => 1,
        ]);

        Attendance::create([
            'date' => '2018-10-7',
            'employee_id' => 1,
            'check_in' => '2018-10-7 08:00:00',
            'check_out' => '2018-10-7 04:00:00',
            'type' => 1,
        ]);

        Attendance::create([
            'date' => '2018-10-8',
            'employee_id' => 1,
            'check_in' => '2018-10-8 08:00:00',
            'check_out' => '2018-10-8 04:00:00',
            'type' => 1,
        ]);

        Attendance::create([
            'date' => '2018-10-9',
            'employee_id' => 1,
            'check_in' => '2018-10-9 08:00:00',
            'check_out' => '2018-10-9 04:00:00',
            'type' => 1,
        ]);

        Attendance::create([
            'date' => '2018-10-10',
            'employee_id' => 1,
            'check_in' => '2018-10-10 08:00:00',
            'check_out' => '2018-10-10 04:00:00',
            'type' => 1,
        ]);

        // =========================================== employee 2
        Attendance::create([
            'date' => '2018-10-1',
            'employee_id' => 2,
            'check_in' => '2018-10-1 08:00:00',
            'check_out' => '2018-10-1 04:10:00',
            'type' => 1,
        ]);

        Attendance::create([
            'date' => '2018-10-2',
            'employee_id' => 2,
            'check_in' => '2018-10-2 08:00:00',
            'check_out' => '2018-10-2 04:10:00',
            'type' => 1,
        ]);

        Attendance::create([
            'date' => '2018-10-3',
            'employee_id' => 2,
            'check_in' => '2018-10-3 08:00:00',
            'check_out' => '2018-10-3 04:00:00',
            'type' => 1,
        ]);

        Attendance::create([
            'date' => '2018-10-4',
            'employee_id' => 2,
            'check_in' => '2018-10-4 08:00:00',
            'check_out' => '2018-10-4 04:00:00',
            'type' => 1,
        ]);

        Attendance::create([
            'date' => '2018-10-8',
            'employee_id' => 2,
            'check_in' => '2018-10-8 08:00:00',
            'check_out' => '2018-10-8 04:00:00',
            'type' => 1,
        ]);

        Attendance::create([
            'date' => '2018-10-10',
            'employee_id' => 2,
            'check_in' => '2018-10-10 08:00:00',
            'check_out' => '2018-10-10 04:00:00',
            'type' => 1,
        ]);

        // =========================================== employee 3
        Attendance::create([
            'date' => '2018-10-1',
            'employee_id' => 3,
            'check_in' => '2018-10-1 08:00:00',
            'check_out' => '2018-10-1 04:10:00',
            'type' => 1,
        ]);

        Attendance::create([
            'date' => '2018-10-2',
            'employee_id' => 3,
            'check_in' => '2018-10-2 08:00:00',
            'check_out' => '2018-10-2 04:10:00',
            'type' => 1,
        ]);

        Attendance::create([
            'date' => '2018-10-3',
            'employee_id' => 3,
            'check_in' => '2018-10-3 08:00:00',
            'check_out' => '2018-10-3 04:00:00',
            'type' => 1,
        ]);

        Attendance::create([
            'date' => '2018-10-4',
            'employee_id' => 3,
            'check_in' => '2018-10-4 08:00:00',
            'check_out' => '2018-10-4 04:00:00',
            'type' => 1,
        ]);

        Attendance::create([
            'date' => '2018-10-7',
            'employee_id' => 3,
            'check_in' => '2018-10-7 08:00:00',
            'check_out' => '2018-10-7 04:00:00',
            'type' => 1,
        ]);

        Attendance::create([
            'date' => '2018-10-8',
            'employee_id' => 3,
            'check_in' => '2018-10-8 08:00:00',
            'check_out' => '2018-10-8 04:00:00',
            'type' => 1,
        ]);

        Attendance::create([
            'date' => '2018-10-9',
            'employee_id' => 3,
            'check_in' => '2018-10-9 08:00:00',
            'check_out' => '2018-10-9 04:00:00',
            'type' => 1,
        ]);

        Attendance::create([
            'date' => '2018-10-10',
            'employee_id' => 3,
            'check_in' => '2018-10-10 08:00:00',
            'check_out' => '2018-10-10 04:00:00',
            'type' => 1,
        ]);

        Schema::enableForeignKeyConstraints();
    }
}
