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
            'email' => 'admin@gmail.com',
            'telefono' => '3175331444',
            'direccion' => 'Ambala',
            'password' => bcrypt('12345678')
        ])->assignRole('Admin');

        User::create([
            'name' => 'Usuario',
            'email' => 'user@gmail.com',
            'telefono' => '3175331444',
            'direccion' => 'Ambala',
            'password' => bcrypt('12345678')
        ])->assignRole('Usuario');
    }
}
