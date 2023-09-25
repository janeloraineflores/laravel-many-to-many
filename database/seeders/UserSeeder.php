<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

//Models
use App\Models\User;

//Helpers
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jane = [
            'name' => 'Jane',
            'email' => 'jane@boolean.careers',
            'password' => 'password',
        ];

        User::truncate();

        User::create([
            'name' => $jane['name'],
            'email' => $jane['email'],
            'password' => Hash::make($jane['password'])
        ]);
    }
}