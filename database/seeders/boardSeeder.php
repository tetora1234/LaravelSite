<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\board;

class boardSeeder extends Seeder
{
    public function run()
    {
        board::factory()->count(100)->create();
    }
}
