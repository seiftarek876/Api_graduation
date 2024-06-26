<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'user_name'=>'Marwan Emad',
            'user_phone'=>'01265498753',
            'user_email'=>'marwan@gmail.com',
            'user_password'=>Hash::make('123456'),
            'user_score'=>10,
            'qr_code'=>'sdfsdgsgsgsdgsdgsdgsg'
        ]);
    }
}
