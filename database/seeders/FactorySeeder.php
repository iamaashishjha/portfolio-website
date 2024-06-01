<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\BlogPost;
use App\Models\BlogTags;
use App\Models\NewsPost;
use App\Models\NewsTags;
use App\Models\Membership;
use App\Models\BulkMessage;
use App\Models\PopupNotice;
use App\Models\BlogCategory;
use App\Models\NewsCategory;
use Illuminate\Database\Seeder;

class FactorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BlogCategory::factory()->count(10)->create();
        BlogTags::factory()->count(10)->create();
        BlogPost::factory()->count(10)->create();
        NewsCategory::factory()->count(10)->create();
        NewsTags::factory()->count(10)->create();
        NewsPost::factory()->count(10)->create();
        PopupNotice::factory()->count(10)->create();
        // Membership::factory()->count(10)->create();
        Event::factory()->count(10)->create();
        BulkMessage::factory()->count(10)->create();
    }
}
