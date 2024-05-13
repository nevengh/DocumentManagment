<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'neven ghasoun',
            'email' => 'neven@gmail.com',
            'password' => 'neev123',
            'isAdmin' => true,
        ]);
    }
}
