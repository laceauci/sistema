<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $roles1 = Role::create(['name' => 'Admin']);
        $roles2 = Role::create(['name' => 'Escritor']);
        $roles3 = Role::create(['name' => 'Blogger']);

        Permission::create(['name' => 'admin.index'])->syncRoles([$roles1,$roles2,$roles3]);

        Permission::create(['name' => 'admin.empleado.index'])->syncRoles([$roles1]);
        Permission::create(['name' => 'admin.empleado.create'])->syncRoles([$roles1]);
        Permission::create(['name' => 'admin.empleado.edit'])->syncRoles([$roles1]);
        Permission::create(['name' => 'admin.empleado.destroy'])->syncRoles([$roles1]);


        Permission::create(['name' => 'evento.index'])->syncRoles([$roles1]);

        Permission::create(['name' => 'clientes.index'])->syncRoles([$roles1]);
        Permission::create(['name' => 'clientes.create'])->syncRoles([$roles1]);
        Permission::create(['name' => 'clientes.edit'])->syncRoles([$roles1]);
        Permission::create(['name' => 'clientes.destroy'])->syncRoles([$roles1]);



    }
}
