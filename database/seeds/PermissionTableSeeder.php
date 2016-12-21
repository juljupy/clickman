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
        Permission::create([
            'name' => 'view_user',
            'fullname' => 'View user'
        ]);

        Permission::create([
            'name' => 'new_user',
            'fullname' => 'New user'
        ]);

        Permission::create([
            'name' => 'edit_user',
            'fullname' => 'Edit user'
        ]);

        Permission::create([
            'name' => 'delete_user',
            'fullname' => 'Delete user'
        ]);
    }
}
