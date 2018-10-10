<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

use App\Models\AttendanceType;

class AttendanceTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('attendance_types')->truncate();

        AttendanceType::create([
            'name' => 'Work',
        ]);

        AttendanceType::create([
            'name' => 'Halfday',
        ]);

        AttendanceType::create([
            'name' => 'Overtime',
        ]);

        AttendanceType::create([
            'name' => 'Absent',
        ]);

        Schema::enableForeignKeyConstraints();
    }
}
