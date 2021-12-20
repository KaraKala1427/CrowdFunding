<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
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
            "full_name" => "admin",
            "email" => "admin@gmail.com",
            "password"  => Hash::make('admin123'),
            "role_id" => Role::ADMIN
        ]);

        User::create([
            "full_name" => "moderator",
            "email" => "moderator@gmail.com",
            "password"  => Hash::make('moderator123'),
            "role_id" => Role::MODERATOR
        ]);
    }
}
