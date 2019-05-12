<?php

use App\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [[
            'id'         => '1',
            'title'      => 'user_management_access',
            'created_at' => '2019-05-12 17:46:50',
            'updated_at' => '2019-05-12 17:46:50',
        ],
            [
                'id'         => '2',
                'title'      => 'permission_create',
                'created_at' => '2019-05-12 17:46:50',
                'updated_at' => '2019-05-12 17:46:50',
            ],
            [
                'id'         => '3',
                'title'      => 'permission_edit',
                'created_at' => '2019-05-12 17:46:50',
                'updated_at' => '2019-05-12 17:46:50',
            ],
            [
                'id'         => '4',
                'title'      => 'permission_show',
                'created_at' => '2019-05-12 17:46:50',
                'updated_at' => '2019-05-12 17:46:50',
            ],
            [
                'id'         => '5',
                'title'      => 'permission_delete',
                'created_at' => '2019-05-12 17:46:50',
                'updated_at' => '2019-05-12 17:46:50',
            ],
            [
                'id'         => '6',
                'title'      => 'permission_access',
                'created_at' => '2019-05-12 17:46:50',
                'updated_at' => '2019-05-12 17:46:50',
            ],
            [
                'id'         => '7',
                'title'      => 'role_create',
                'created_at' => '2019-05-12 17:46:50',
                'updated_at' => '2019-05-12 17:46:50',
            ],
            [
                'id'         => '8',
                'title'      => 'role_edit',
                'created_at' => '2019-05-12 17:46:50',
                'updated_at' => '2019-05-12 17:46:50',
            ],
            [
                'id'         => '9',
                'title'      => 'role_show',
                'created_at' => '2019-05-12 17:46:50',
                'updated_at' => '2019-05-12 17:46:50',
            ],
            [
                'id'         => '10',
                'title'      => 'role_delete',
                'created_at' => '2019-05-12 17:46:50',
                'updated_at' => '2019-05-12 17:46:50',
            ],
            [
                'id'         => '11',
                'title'      => 'role_access',
                'created_at' => '2019-05-12 17:46:50',
                'updated_at' => '2019-05-12 17:46:50',
            ],
            [
                'id'         => '12',
                'title'      => 'user_create',
                'created_at' => '2019-05-12 17:46:50',
                'updated_at' => '2019-05-12 17:46:50',
            ],
            [
                'id'         => '13',
                'title'      => 'user_edit',
                'created_at' => '2019-05-12 17:46:50',
                'updated_at' => '2019-05-12 17:46:50',
            ],
            [
                'id'         => '14',
                'title'      => 'user_show',
                'created_at' => '2019-05-12 17:46:50',
                'updated_at' => '2019-05-12 17:46:50',
            ],
            [
                'id'         => '15',
                'title'      => 'user_delete',
                'created_at' => '2019-05-12 17:46:50',
                'updated_at' => '2019-05-12 17:46:50',
            ],
            [
                'id'         => '16',
                'title'      => 'user_access',
                'created_at' => '2019-05-12 17:46:50',
                'updated_at' => '2019-05-12 17:46:50',
            ],
            [
                'id'         => '17',
                'title'      => 'social_link_create',
                'created_at' => '2019-05-12 17:46:50',
                'updated_at' => '2019-05-12 17:46:50',
            ],
            [
                'id'         => '18',
                'title'      => 'social_link_edit',
                'created_at' => '2019-05-12 17:46:50',
                'updated_at' => '2019-05-12 17:46:50',
            ],
            [
                'id'         => '19',
                'title'      => 'social_link_show',
                'created_at' => '2019-05-12 17:46:50',
                'updated_at' => '2019-05-12 17:46:50',
            ],
            [
                'id'         => '20',
                'title'      => 'social_link_delete',
                'created_at' => '2019-05-12 17:46:50',
                'updated_at' => '2019-05-12 17:46:50',
            ],
            [
                'id'         => '21',
                'title'      => 'social_link_access',
                'created_at' => '2019-05-12 17:46:50',
                'updated_at' => '2019-05-12 17:46:50',
            ]];

        Permission::insert($permissions);
    }
}
