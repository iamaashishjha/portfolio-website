<?php

namespace Database\Seeders;

use App\Models\PopupNotice;
use Illuminate\Database\Seeder;

class PopupNoticeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PopupNotice::factory()->count(10)->create();
    }
}
