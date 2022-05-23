<?php

namespace Database\Seeders;

use App\Models\BlogCategory;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserTableSeeder::class,
            BlogCategorySeeder::class,
            BlogPostSeeder::class,
            BlogTagsSeeder::class,
            AppsettingSeeder::class,
            NewsCategorySeeder::class,
            NewsPostSeeder::class,
            NewsTagsSeeder::class,
        ]);
    }
}
