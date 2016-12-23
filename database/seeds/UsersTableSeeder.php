<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
        	'name' => 'Administrator',
        	'email' => 'admin@mail.com',
        	'password' => Hash::make('adminclick'),
            'verified' => 1
        ]);

        User::create([
            'name' => 'Agent',
            'email' => 'agent@mail.com',
            'password' => Hash::make('agentclick'),
            'verified' => 1
        ]);

        User::create([
            'name' => 'Customer',
            'email' => 'customer@mail.com',
            'password' => Hash::make('customerclick'),
            'verified' => 1
        ]);
    }
}