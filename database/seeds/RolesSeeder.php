<?php

use Illuminate\Database\Seeder;


class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['nombre'=>'administrador','sueldo_base'=>0],
            ['nombre'=>'usuario','sueldo_base'=>0],
            ['nombre'=>'gerente','sueldo_base'=>1630],
            ['nombre'=>'responsable de compras','sueldo_base'=>1000],
            ['nombre'=>'jefe de cocina','sueldo_base'=>3000],
            ['nombre'=>'cocinero','sueldo_base'=>1487],
            ['nombre'=>'ayudante de cocina','sueldo_base'=>1027],
            ['nombre'=>'jefe de sala','sueldo_base'=>1600],
            ['nombre'=>'camarero','sueldo_base'=>1100],
            ['nombre'=>'equipo de limpieza','sueldo_base'=>832],
            ['nombre'=>'repartidor','sueldo_base'=>850],
        ];
        DB::table('roles')->insert($data);
    }
}
