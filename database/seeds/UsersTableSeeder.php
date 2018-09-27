<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new User();
        $admin->email = 'admin@test.com';
        $admin->name = 'Administrator';
        $admin-> password = Hash::make('password');
        $admin->save();
    }
}
