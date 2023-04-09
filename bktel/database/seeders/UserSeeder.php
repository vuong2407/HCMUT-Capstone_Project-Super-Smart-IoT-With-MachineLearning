<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'AdminSeeder',
                'email' => 'thanhnha141001@gmail.com',
                'password' => Hash::make('adminadmin'),
                'role_id' => '1',
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'SupervisorSeeder',
                'email' => 'supervisor@gmail.com',
                'password' => Hash::make('supervisor'),
                'role_id' => '2',
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'UserSeeder',
                'email' => 'customer@gmail.com',
                'password' => Hash::make('useruser'),
                'role_id' => '3',
                'created_at' => Carbon::now()
            ],
        ]);
    }
}
