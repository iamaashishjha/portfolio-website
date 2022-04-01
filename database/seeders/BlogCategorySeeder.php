<?php

namespace Database\Seeders;

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
        //
        DB::table('blog_categories')->insert([
            'title' => 'Development',
            'description' => 'admin@admin.com',
            'category_image' => 'admin@admin.com',
            'keywords' => 'admin@admin.com',
            'meta_description' => 'admin@admin.com',
            'meta_title' => 'admin@admin.com',
            'slug' => 'development',
            'is_deleted' => '0',
            'created_at' => Carbon::now(),

        ]);
    }
}
