<?php

use App\Role\UserRole;
use App\User;
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
        $user = (new User([
            "name" => "admin",
            "email" => "admin@admin.com",
            "password" => Hash::make("123"),
        ]));
        $user->addRole(UserRole::ROLE_ADMIN);
        $user->save();

        $user = (new User([
            "name" => "lib",
            "email" => "lib@lib.com",
            "password" => Hash::make("123"),
        ]));
        $user->addRole(UserRole::ROLE_MANAGEMENT);
        $user->save();

        $user = (new User([
            "name" => "user",
            "email" => "user@user.com",
            "password" => Hash::make("123"),
        ]));
        $user->addRole(UserRole::ROLE_CUSTOMER);
        $user->save();
    }
}
