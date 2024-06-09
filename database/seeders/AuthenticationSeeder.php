<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Role;
use App\Models\User;
use App\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Artisan;

class AuthenticationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->rolesSeeder();
        $this->userSeeder();
        $this->assignRolesAndAllPermissions();
    }


    private function rolesSeeder(){
        // DB::table('roles')->truncate();
        DB::table('roles')->insert([
            ['id' => 1, 'name' => 'Superadmin', 'guard_name' => 'web', 'created_at' => Carbon::now()->toDateTimeString(), 'updated_at' => Carbon::now()->toDateTimeString()],
            ['id' => 2, 'name' => 'Centraladmin', 'guard_name' => 'web', 'created_at' => Carbon::now()->toDateTimeString(), 'updated_at' => Carbon::now()->toDateTimeString()],
            ['id' => 3, 'name' => 'Provinceadmin', 'guard_name' => 'web', 'created_at' => Carbon::now()->toDateTimeString(), 'updated_at' => Carbon::now()->toDateTimeString()],
            ['id' => 4, 'name' => 'Districtadmin', 'guard_name' => 'web', 'created_at' => Carbon::now()->toDateTimeString(), 'updated_at' => Carbon::now()->toDateTimeString()],
            ['id' => 5, 'name' => 'Palikaadmin', 'guard_name' => 'web', 'created_at' => Carbon::now()->toDateTimeString(), 'updated_at' => Carbon::now()->toDateTimeString()],
            ['id' => 6, 'name' => 'Memberadmin', 'guard_name' => 'web', 'created_at' => Carbon::now()->toDateTimeString(), 'updated_at' => Carbon::now()->toDateTimeString()],
        ]);
    }

    private function userSeeder(){
        // DB::table('users')->truncate();
        User::create([
            'name' => 'Nagrik Unmukti PartyDetails',
            'email' => 'admin@admin.com',
            'password' => Hash::make('Admin@1234'),
            'email_verified_at' => now(),
        ]);
    }

    private function assignRolesAndAllPermissions(){
        $user = User::find(1);
        Artisan::Call('generate:permissions');
        $permissions = Permission::all();
        $super_admin_role = Role::find(1);
        $super_admin_role->givePermissionTo($permissions);
        $user->assignRoleCustom("superadmin", $user->id);
    }
}
