<?php

namespace Database\Seeders;

use App\Models\BulkMessage;
use Illuminate\Database\Seeder;

class BulkMessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BulkMessage::factory()->count(10)->create();
    }
}
