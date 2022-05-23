<?php

namespace Database\Seeders;

use App\Models\NewsTags;
use Illuminate\Database\Seeder;

class NewsTagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        NewsTags::factory()->count(10)->create();
    }
}
