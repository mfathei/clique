<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

use App\Models\Setting;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('settings')->truncate();

        $work_days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday'];
        
        Setting::create([
            'company_id' => 1,
            'work_days' => json_encode($work_days),
            'work_start' => strtotime(date('08:00:00')),
            'work_end' => strtotime(date('16:00:00')),
        ]);

        Schema::enableForeignKeyConstraints();
    }
}
