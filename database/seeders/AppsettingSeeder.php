<?php

namespace Database\Seeders;

use App\Models\AppSettings;
use App\Models\CompanyDetails;
use Illuminate\Database\Seeder;

class AppsettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AppSettings::create([
            'site_title' => 'Nagrik Unmukti PartyDetails',
            // 'site_title_image' => 'https://picsum.photos/200/300',
            'meta_description' => 'admin@admin.com',
            'meta_title' => 'admin@admin.com',
            'keywords' => 'admin@admin.com',
        ]);

        CompanyDetails::create([
            'company_name_en' => 'Nagrik Unmukti PartyDetails',
            'company_name_lc' => 'Nagrik Unmukti PartyDetails',
            'company_description' => 'Nagrik Unmukti PartyDetails',
            'logo_image' => '',
            'phone_number' => '+977 XXXXXXXXXX',
            'mobile_number' => '+977 XXXXXXXXXX',
            'email_address' => 'admin@admin.com',
            'company_address' => 'Dillibazar, Kathmandu',
            'total_members' => '5,68,490',
            'google_map' => '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d14127.915048481324!2d85.3436734!3d27.717941999999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2snp!4v1653840078208!5m2!1sen!2snp" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
            'about_us' => 'admin@admin.com',
            'our_history' => 'admin@admin.com',
            'our_vision' => 'admin@admin.com',
            'our_mission' => 'Nagrik Unmukti PartyDetails',
            'home_about_content' => 'https://picsum.photos/200/300',
            'president_image' => null,
            'message_from_president' => 'admin@admin.com',
            'president_name' => 'Ranjeeta Shrestha Chaudhary',
            'created_by' => 1,
        ]);
    }
}
