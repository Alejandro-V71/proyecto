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
        //

        $role1 =  Role::create(['name' => 'Asesor']);
        $role2 = Role::create(['name' => 'Tecnico']);
        $role3 =  Role::create(['name' => 'Cliente']);

        //permisos de cliente
        $permission = Permission::create(['name' => 'dash'])->syncRoles([$role1,$role2,$role3]);
        $permission = Permission::create(['name' => 'dash.usuario.index'])->syncRoles([$role1,$role2]);
        $permission = Permission::create(['name' => 'dash.solicitudes.index'])->syncRoles([$role1,$role2,$role3]);
        $permission = Permission::create(['name' => 'dash.solicitudes.estado'])->syncRoles([$role1,$role2]);
        $permission = Permission::create(['name' => 'dash.solicitudes.detalle'])->syncRoles([$role1,$role2]);
        $permission = Permission::create(['name' => 'dash.servicios.servicio'])->syncRoles([$role1,$role2]);

        $permission = Permission::create(['name' => 'dash.calendario.index'])->syncRoles([$role1,$role2]);
        $permission = Permission::create(['name' => 'dash.repuestos.index'])->syncRoles([$role1,$role2]);
        $permission = Permission::create(['name' => 'dash.reporteEstado.index'])->syncRoles([$role1,$role2]);



    }
}
