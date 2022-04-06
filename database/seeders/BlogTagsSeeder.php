<?php

namespace Database\Seeders;

use App\Models\BlogTags;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlogTagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BlogTags::factory()->count(10)->create();
        // for ($i=1; $i < 60; $i++) { 
        //     # code...
        //     DB::table('blog_post_blog_tags')->insert([
        //         'blog_post_id' => rand(1, 20),
        //         'blog_tags_id' => rand(1, 10),
        //     ]);
        // }
    }
}
