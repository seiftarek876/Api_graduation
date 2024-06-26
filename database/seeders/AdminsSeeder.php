<?php

namespace Database\Seeders;

use App\Models\admins;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        admins::factory()->create([
            'name'=>'seif tarek',
            'email'=>'seif@gmail.com',
            'password'=>Hash::make('12345678'),
            'phone'=>'01203931714',
            'role'=>'user_level'
        ]);
    }
}
