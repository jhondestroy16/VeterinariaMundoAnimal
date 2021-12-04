<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'jsvalenciag@ut.edu.co',
            'password' => bcrypt('12345678')
        ])->assignRole('Admin');

        User::create([
            'name' => 'Usuario',
            'email' => 'jsvalencia32@misena.edu.co',
            'password' => bcrypt('12345678')
        ])->assignRole('Usuario');
    }
}
