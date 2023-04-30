<?php

namespace Database\Seeders;

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
            TypesSeeder::class,
            RoleTableSeeder::class,
            UserTableSeeder::class,
            MasterSeeder::class,
            AppsettingSeeder::class,

            BlogCategorySeeder::class,
            BlogPostSeeder::class,
            BlogTagsSeeder::class,
            NewsCategorySeeder::class,
            NewsPostSeeder::class,
            NewsTagsSeeder::class,
            EventSeeder::class,
            PopupNoticeSeeder::class,
            BulkMessageSeeder::class,
        ]);
    }
}
