<?php

namespace Database\Seeders;

use App\Http\Controllers\MembershipController;
use App\Models\BlogCategory;
use App\Models\BulkMessage;
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
            TypesSeeder::class,
            RoleTableSeeder::class,
            UserTableSeeder::class,
            BlogCategorySeeder::class,
            BlogPostSeeder::class,
            BlogTagsSeeder::class,
            AppsettingSeeder::class,
            NewsCategorySeeder::class,
            NewsPostSeeder::class,
            NewsTagsSeeder::class,
            EventSeeder::class,
            MasterSeeder::class,
            PopupNoticeSeeder::class,
            BulkMessageSeeder::class,
            MembershipSeeder::class,
        ]);
    }
}
