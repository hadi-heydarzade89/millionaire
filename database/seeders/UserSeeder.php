<?php

namespace Database\Seeders;

use App\Enums\UserRoleEnum;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        User::insert([
            [
                'name' => 'admin',
                'surname' => 'main',
                'email' => 'admin@millionaire.com',
                'password' => bcrypt('123456789'),
                'role' => UserRoleEnum::ADMIN->value,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'user',
                'surname' => 'secondary',
                'email' => 'user@millionaire.com',
                'password' => bcrypt('123456789'),
                'role' => UserRoleEnum::USER->value,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
