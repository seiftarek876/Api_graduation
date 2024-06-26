<?php

namespace Database\Seeders;

use App\Models\binGroups;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BinGroupsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        binGroups::factory()->create([
            'bins_count'=>3,
            'location'=>'location 1',
            'admin_id'=>1,
            'lessor_id'=>1
        ]);
    }
}
