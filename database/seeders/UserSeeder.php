<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([

            [
                'name' => 'admin',
                'email' => 'admin@turklog.net',
                'password' => Hash::make('3535'),
                'role' => 'admin',
                'status' => 'active',
                'email_verified_at' => Carbon::now(),
            ],

                ]);
    }
}
