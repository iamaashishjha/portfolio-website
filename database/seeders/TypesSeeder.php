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
            array('id' => 5, 'name_en' => 'Mobile', 'name_lc' => 'मोबाइल'),

            array('id' => 6, 'name_en' => 'Committee', 'name_lc' => 'समिति'),
            // array('id' => 7, 'name_en' => 'Text', 'name_lc' => 'लेखिएको'),
            // array('id' => 8, 'name_en' => 'File', 'name_lc' => 'फाइल'),
            // array('id' => 9, 'name_en' => 'Mobile', 'name_lc' => 'मोबाइल'),
            // array('id' => 10, 'name_en' => 'Email', 'name_lc' => 'इमेल'),

            // array('id' => 11, 'name_en' => 'Text', 'name_lc' => 'लेखिएको'),
            // array('id' => 12, 'name_en' => 'File', 'name_lc' => 'फाइल'),
            // array('id' => 13, 'name_en' => 'Mobile', 'name_lc' => 'मोबाइल'),
            // array('id' => 14, 'name_en' => 'Email', 'name_lc' => 'इमेल'),
            // array('id' => 15, 'name_en' => 'Text', 'name_lc' => 'लेखिएको'),
            // array('id' => 16, 'name_en' => 'File', 'name_lc' => 'फाइल'),
            // array('id' => 17, 'name_en' => 'Mobile', 'name_lc' => 'मोबाइल'),
            // array('id' => 18, 'name_en' => 'Email', 'name_lc' => 'इमेल'),
            // array('id' => 19, 'name_en' => 'Text', 'name_lc' => 'लेखिएको'),
            // array('id' => 20, 'name_en' => 'File', 'name_lc' => 'फाइल'),

            array('id' => 21, 'name_en' => 'Mobile', 'name_lc' => 'मोबाइल'),
            array('id' => 22, 'name_en' => 'Email', 'name_lc' => 'इमेल'),
            array('id' => 23, 'name_en' => 'Text', 'name_lc' => 'लेखिएको'),
            // array('id' => 24, 'name_en' => 'File', 'name_lc' => 'फाइल'),
            // array('id' => 25, 'name_en' => 'File', 'name_lc' => 'फाइल'),
            // array('id' => 26, 'name_en' => 'File', 'name_lc' => 'फाइल'),
            // array('id' => 27, 'name_en' => 'File', 'name_lc' => 'फाइल'),
            // array('id' => 28, 'name_en' => 'File', 'name_lc' => 'फाइल'),
            // array('id' => 29, 'name_en' => 'File', 'name_lc' => 'फाइल'),
            array('id' => 30, 'name_en' => 'Mobile', 'name_lc' => 'मोबाइल'),

            // Committee Types Master Seeder 
            array('id' => 31, 'name_en' => 'Central Committee', 'name_lc' => 'केन्द्रीय समिति'),
            array('id' => 32, 'name_en' => 'Province Committee', 'name_lc' => 'प्रदेश समिति'),
            array('id' => 33, 'name_en' => 'District Committee', 'name_lc' => 'जिल्ला समिति'),
            array('id' => 34, 'name_en' => 'Local Level Committee', 'name_lc' => 'स्थानीय तह समिति'),

            // Committee Member Type Master seeder 
            array('id' => 41, 'name_en' => 'Committee President', 'name_lc' => 'समिति अध्यक्ष'),
            array('id' => 42, 'name_en' => 'Committee Vice President', 'name_lc' => 'समिति उपाध्यक्ष'),
            array('id' => 43, 'name_en' => 'Committee Secretray General', 'name_lc' => 'समितिका महासचिव'),
            array('id' => 44, 'name_en' => 'Committee Secretray', 'name_lc' => 'समिति सचिव'),
            array('id' => 45, 'name_en' => 'Committee Deputy Secretray', 'name_lc' => 'समितिका उपसचिव'),
            array('id' => 46, 'name_en' => 'Committee Member', 'name_lc' => 'समिति सदस्य'),
        ]);
    }
}
