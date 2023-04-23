<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use App\Models\Permission;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Artisan;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Nagrik Unmukti Party',
            'email' => 'admin@admin.com',
            'password' => Hash::make('Admin@1234'),
            'email_verified_at' => now(),
        ]);
        User::factory()->count(10)->create();

        Artisan::Call('generate:permissions');
        $permissions = Permission::all();
        $super_admin_role = Role::find(1);
        $super_admin_role->givePermissionTo($permissions);
        $user->assignRoleCustom("superadmin", $user->id);

    }
}
