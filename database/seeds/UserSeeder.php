<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name'=>'Admin Role',
            'email'=>'admin@role.test',
            'password'=>bcrypt('1234')
        ]);

        $admin->assignRole('admin');

        $user = User::create([
            'name'=>'User Role',
            'email'=>'user@role.test',
            'password'=>bcrypt('1234')
        ]);

        $user->assignRole('user');
    }
}
