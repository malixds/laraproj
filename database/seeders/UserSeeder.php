<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\UserRole;
use App\Models\Role;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();

        // Создаем три пользователя
        foreach (range(1, 2) as $index) {
            $user = User::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => '130603maxim',
            ]);

            if ($index == 1) {
                Role::create([
                    'name' => 'Regular',
                ]);
            }
            else {
                Role::create([
                    'name' => 'Admin',
                ]);
            }

            UserRole::create([
                'user_id' => $user->id,
                'role_id' => 1,
            ]);
        }

        $user = User::create([
            'name' => $faker->name,
            'email' => $faker->email,
            'password' => '130603maxim',
        ]);

        // Привязываем пользователя к роли с id = 2
        UserRole::create([
            'user_id' => $user->id,
            'role_id' => 2,
        ]);
    }
}
