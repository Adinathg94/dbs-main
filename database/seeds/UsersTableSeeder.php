<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [[
            'id'             => 1,
            'name'           => 'Admin',
            'email'          => 'admin@admin.com',
            'password'       => '$2y$10$z1lLFgGJI0xrPX7c2Famtehf5M7NQx/UvHbyABQMgLBJFJoBtu5UW',
            'remember_token' => null,
            'created_at'     => '2019-05-11 14:49:59',
            'updated_at'     => '2019-05-11 14:49:59',
            'deleted_at'     => null,
        ]];

        User::insert($users);
    }
}
