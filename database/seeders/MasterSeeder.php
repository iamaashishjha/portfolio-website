<?php

namespace Database\Seeders;

use App\Models\AppSettings;
use App\Models\CompanyDetails;
use Illuminate\Database\Seeder;

class MasterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AppSettings::create([
            'site_title' => 'Nagrik Unmukti Party',
            'site_title_image' => 'https://picsum.photos/200/300',
            'meta_description' => 'admin@admin.com',
            'meta_title' => 'admin@admin.com',
            'keywords' => 'admin@admin.com',
        ]);

        CompanyDetails::create([
            'company_name_en' => 'Nagrik Unmukti Party',
            'company_name_lc' => 'https://picsum.photos/200/300',
            'company_description' => 'admin@admin.com',
            'logo' => 'admin@admin.com',
            'phone_number' => 'admin@admin.com',
            'mobile_number' => 'Nagrik Unmukti Party',
            'email_address' => 'https://picsum.photos/200/300',
            'company_address' => 'admin@admin.com',
            'total_members' => 1000000,
            'google_map' => 'admin@admin.com',
            'about_us' => 'admin@admin.com',
            'our_history' => 'admin@admin.com',
            'our_vision' => 'admin@admin.com',
            'our_mission' => 'Nagrik Unmukti Party',
            'home_about_content' => 'https://picsum.photos/200/300',
            'home_about_image_1' => 'admin@admin.com',
            'home_about_image_2' => 'admin@admin.com',
            'home_about_image_3' => 'admin@admin.com',
            'home_about_accordion_title_1' => 'Nagrik Unmukti Party',
            'home_about_accordion_title_2' => 'https://picsum.photos/200/300',
            'home_about_accordion_title_3' => 'admin@admin.com',
            'home_about_accordion_content_1' => 'admin@admin.com',
            'home_about_accordion_content_2' => 'admin@admin.com',
            'home_about_accordion_content_3' => 'admin@admin.com',
            'created_by' => 1,
        ]);
    }
}
