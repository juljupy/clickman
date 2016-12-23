<?php

use Illuminate\Database\Seeder;
use App\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //User permissions
        Permission::create([
            'name' => 'list_user',
            'fullname' => 'List user'
        ]);
        
        Permission::create([
            'name' => 'view_user',
            'fullname' => 'View user'
        ]);

        Permission::create([
            'name' => 'create_user',
            'fullname' => 'Create user'
        ]);

        Permission::create([
            'name' => 'edit_user',
            'fullname' => 'Edit user'
        ]);

        Permission::create([
            'name' => 'delete_user',
            'fullname' => 'Delete user'
        ]);

        //Role permissions
        Permission::create([
            'name' => 'list_role',
            'fullname' => 'List role'
        ]);
        
        Permission::create([
            'name' => 'view_role',
            'fullname' => 'View role'
        ]);

        Permission::create([
            'name' => 'create_role',
            'fullname' => 'Create role'
        ]);

        Permission::create([
            'name' => 'edit_role',
            'fullname' => 'Edit role'
        ]);

        Permission::create([
            'name' => 'delete_role',
            'fullname' => 'Delete role'
        ]);
    }
}
