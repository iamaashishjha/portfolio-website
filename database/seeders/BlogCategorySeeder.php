<?php

namespace Database\Seeders;

use App\Models\BlogCategory;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class BlogCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BlogCategory::factory()->count(10)->create();
    }
}
