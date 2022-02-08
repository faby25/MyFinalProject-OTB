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
        $Role1 = Role::create(['name' => 'Admin']);
        $Role2 = Role::create(['name' => 'Cajero']);
        $Role3 = Role::create(['name' => 'Lecturador']);
        //$Role4 = Role::create(['name' => 'Socio']);

       // Permission::create(['name'=>'home'])->syncRoles([$Role1,$Role2,$Role3,$Role4]);

        Permission::create(['name' => 'user.index'])->assignRole($Role1);
        Permission::create(['name' => 'user.create'])->assignRole($Role1);
        Permission::create(['name' => 'user.edit'])->assignRole($Role1);
        Permission::create(['name' => 'user.destroy'])->assignRole($Role1);

       // Permission::create(['name' => 'tconsumo.index'])->syncRoles([$Role1,$Role4]);
        Permission::create(['name' => 'tconsumo.create'])->assignRole($Role1);
        Permission::create(['name' => 'tconsumo.edit'])->assignRole($Role1);
        Permission::create(['name' => 'tconsumo.destroy'])->assignRole($Role1);

       // Permission::create(['name' => 'tmulta.index'])->syncRoles([$Role1,$Role4]);
        Permission::create(['name' => 'tmulta.create'])->assignRole($Role1);
        Permission::create(['name' => 'tmulta.edit'])->assignRole($Role1);
        Permission::create(['name' => 'tmulta.destroy'])->assignRole($Role1);

        Permission::create(['name' => 'caja.index'])->assignRole($Role2);
        Permission::create(['name' => 'caja.create'])->assignRole($Role2);
        Permission::create(['name' => 'caja.edit'])->assignRole($Role2);
        Permission::create(['name' => 'caja.destroy'])->assignRole($Role2);

        Permission::create(['name' => 'lectura.index'])->assignRole($Role3);
        Permission::create(['name' => 'lectura.create'])->assignRole($Role3);
        Permission::create(['name' => 'lectura.edit'])->assignRole($Role3);
        Permission::create(['name' => 'lectura.destroy'])->assignRole($Role3);

        //Permission::create(['name' => 'notif.index'])->assignRole($Role3);
        Permission::create(['name' => 'notif.create'])->assignRole($Role3);
        Permission::create(['name' => 'notif.edit'])->assignRole($Role3);
        Permission::create(['name' => 'notf.destroy'])->assignRole($Role3);

        Permission::create(['name'=>'reporte'])->syncRoles([$Role1,$Role2,$Role3]);
    }
}
