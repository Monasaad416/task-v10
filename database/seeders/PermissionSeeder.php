<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
           'posts-list',
           'posts-create',
           'posts-edit',
           'posts-delete',

           'categories-list',
           'categories-create',
           'categories-edit',
           'categories-delete',

           'roles-list',
           'roles-create',
           'roles-edit',
           'roles-delete',

           'admins-list',
           'admins-create',
           'admins-edit',
           'admins-delete',


        ];

        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }
    }
}


