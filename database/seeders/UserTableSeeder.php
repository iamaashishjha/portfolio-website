<?php

namespace Database\Seeders;

use App\Models\User;
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
        User::create([
            'name' => 'Aashish Jha',
            'email' => 'admin@admin.com',
            'password' => Hash::make('Admin@1234'),
            'email_verified_at' => now(),
            'role' => 1
        ]);
        User::factory()->count(10)->create();
    }
}
