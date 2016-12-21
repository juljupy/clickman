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
        	'phonenumber' => 123
        ]);
    }
}