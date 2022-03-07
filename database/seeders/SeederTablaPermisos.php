<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

//agregamos el modelo de permisos de spatie
use Spatie\Permission\Models\Permission;

class SeederTablaPermisos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permisos = [

              //Operaciones sobre tabla usuarios
              'ver-usuario',
              'crear-usuario',
              'editar-usuario',
              'borrar-usuario',
            //Operaciones sobre tabla roles
            'ver-rol',
            'crear-rol',
            'editar-rol',
            'borrar-rol',

            //Operacions sobre tabla blogs
            'ver-pqr',
            'crear-pqr',
            'editar-pqr',
            'borrar-pqr',

            //Operacions sobre tabla automoviles
            'ver-automovil',
            'crear-automovil',
            'editar-automovil',
            'borrar-automovil',
        ];

        foreach($permisos as $permiso) {
            Permission::create(['name'=>$permiso]);
        }
    }
}
