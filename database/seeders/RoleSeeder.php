<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Usuario']);

        Permission::create(['name' => 'panel'])->syncRoles([$role1]);
        Permission::create(['name' => 'servicios'])->assignRole($role1);
        Permission::create(['name' => 'horarios'])->assignRole($role1);
        Permission::create(['name' => 'clientes'])->assignRole($role1);
        Permission::create(['name' => 'mascotas'])->assignRole($role1);
        Permission::create(['name' => 'home'])->syncRoles([$role1, $role2]);
    }
}
