<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            // 'name' => Str::random(10),
            'name' => 'Aashish Jha',
            // 'email' => Str::random(10) . '@gmail.com',
            'email' => 'admin@admin.com',
            'password' => Hash::make('Admin@1234'),
        ]);
    }
}
