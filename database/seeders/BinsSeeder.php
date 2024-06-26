<?php

namespace Database\Seeders;

use App\Models\bins;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BinsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        bins::factory()->create([
            'trash_weight'=>10,
            'current_trash_weight'=>0,
            'bin_group_id'=>1
        ]);
    }
}
