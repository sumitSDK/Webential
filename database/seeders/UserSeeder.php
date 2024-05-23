<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345678'),
            'last_name' => 'admin',
            'mobile_no' => '911234567891',
            'address' => 'test address',
            'resume' => 'test resume',
            'image' => 'test image',
            'terms_condition' => '0',
            'reg_date' => '2024-05-17',
            'role' => 'admin',
        ]);
    }
}
