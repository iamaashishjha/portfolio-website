<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('types')->insert([
            array('id' => 1, 'name_en' => 'Mobile', 'name_lc' => 'मोबाइल'),
            array('id' => 2, 'name_en' => 'Email', 'name_lc' => 'इमेल'),
            array('id' => 3, 'name_en' => 'Text', 'name_lc' => 'लेखिएको'),
            array('id' => 4, 'name_en' => 'File', 'name_lc' => 'फाइल'),
        ]);
    }
}
