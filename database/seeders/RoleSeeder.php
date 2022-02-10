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
       $Role4 = Role::create(['name' => 'SuperAdmin']);

    // Permission::create(['name'=>'home'])->syncRoles([$Role1,$Role2,$Role3,$Role4]);

     Permission::create(['name' => 'user.index'])->syncRoles([$Role1,$Role4]);
     Permission::create(['name' => 'user.create'])->syncRoles([$Role1,$Role4]);
     Permission::create(['name' => 'user.edit'])->syncRoles([$Role1,$Role4]);
     Permission::create(['name' => 'user.destroy'])->assignRole($Role4);

    // Permission::create(['name' => 'tconsumo.index'])->syncRoles([$Role1,$Role4]);
     Permission::create(['name' => 'tconsumo.create'])->syncRoles([$Role1,$Role4]);
     Permission::create(['name' => 'tconsumo.edit'])->syncRoles([$Role1,$Role4]);
     Permission::create(['name' => 'tconsumo.destroy'])->assignRole($Role4);

    // Permission::create(['name' => 'tmulta.index'])->syncRoles([$Role1,$Role4]);
     Permission::create(['name' => 'tmulta.create'])->syncRoles([$Role1,$Role4]);
     Permission::create(['name' => 'tmulta.edit'])->syncRoles([$Role1,$Role4]);
     Permission::create(['name' => 'tmulta.destroy'])->assignRole($Role4);

     // Permission::create(['name' => 'tmulta.index'])->syncRoles([$Role1,$Role4]);
     Permission::create(['name' => 'taportes.create'])->syncRoles([$Role1,$Role4]);
     Permission::create(['name' => 'taportes.edit'])->syncRoles([$Role1,$Role4]);
     Permission::create(['name' => 'taportes.destroy'])->assignRole($Role4);

     // Permission::create(['name' => 'caja.index'])->syncRoles([$Role2,$Role4]);
     Permission::create(['name' => 'caja'])->syncRoles([$Role2,$Role4]);
     // Permission::create(['name' => 'caja.edit'])->syncRoles([$Role2,$Role4]);
     Permission::create(['name' => 'caja.destroy'])->assignRole($Role4);

     Permission::create(['name' => 'lectura.index'])->syncRoles([$Role3,$Role4]);
     Permission::create(['name' => 'lectura.create'])->syncRoles([$Role3,$Role4]);
     Permission::create(['name' => 'lectura.edit'])->syncRoles([$Role3,$Role4]);
     Permission::create(['name' => 'lectura.destroy'])->assignRole($Role4);

     //Permission::create(['name' => 'notif.index'])->assignRole($Role4);
     // Permission::create(['name' => 'notice.create'])->syncRoles([$Role3,$Role4]);
     Permission::create(['name' => 'notice.edit'])->syncRoles([$Role3,$Role4]);
     Permission::create(['name' => 'notice.update'])->syncRoles([$Role3,$Role4]);
     // Permission::create(['name' => 'notice.destroy'])->assignRole($Role4);

     Permission::create(['name'=>'reporte.index'])->syncRoles([$Role1,$Role2,$Role3,$Role4]);

     // Permission::create(['name' => 'mreunion.index'])->syncRoles([$Role1,$Role4]);
     Permission::create(['name' => 'mreunion.create'])->syncRoles([$Role1,$Role4]);
     Permission::create(['name' => 'mreunion.edit'])->syncRoles([$Role1,$Role4]);
     Permission::create(['name' => 'mreunion.destroy'])->assignRole($Role4);
    }
}
