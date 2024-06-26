<?php

namespace Database\Seeders;

use App\Models\Lessors;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LessorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Lessors::factory()->create([
            'name'=>'ahmed mohamed',
            'phone_number'=>'01513231566',
            'email'=>'ahmed@gmail.com',
            'subscribtion_fee'=> 50.000
        ]);
    }
}
