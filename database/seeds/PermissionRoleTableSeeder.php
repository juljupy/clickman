<?php

use Illuminate\Database\Seeder;
use App\PermissionRole;

class PermissionRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Permissions for Admin
        PermissionRole::create([
        	'permission_id' => 1,
        	'role_id' => 1
        ]);

        PermissionRole::create([
        	'permission_id' => 2,
        	'role_id' => 1
        ]);

        PermissionRole::create([
        	'permission_id' => 3,
        	'role_id' => 1
        ]);

        PermissionRole::create([
            'permission_id' => 4,
            'role_id' => 1
        ]);

        PermissionRole::create([
        	'permission_id' => 5,
        	'role_id' => 1
        ]);

        PermissionRole::create([
            'permission_id' => 6,
            'role_id' => 1
        ]);

        PermissionRole::create([
            'permission_id' => 7,
            'role_id' => 1
        ]);

        PermissionRole::create([
            'permission_id' => 8,
            'role_id' => 1
        ]);

        PermissionRole::create([
            'permission_id' => 9,
            'role_id' => 1
        ]);

        PermissionRole::create([
            'permission_id' => 10,
            'role_id' => 1
        ]);

        //Permissions for Agent
        PermissionRole::create([
            'permission_id' => 1,
            'role_id' => 2
        ]);

        PermissionRole::create([
            'permission_id' => 2,
            'role_id' => 2
        ]);

        //Permissions for Agent
        PermissionRole::create([
            'permission_id' => 2,
            'role_id' => 3
        ]);

        PermissionRole::create([
            'permission_id' => 4,
            'role_id' => 3
        ]);
    }
}
