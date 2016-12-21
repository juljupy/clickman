<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'admin',
            'fullname' => 'Administrator'
        ]);

        Role::create([
            'name' => 'agent',
            'fullname' => 'Agent'
        ]);

        Role::create([
            'name' => 'customer',
            'fullname' => 'Customer'
        ]);
    }
}
