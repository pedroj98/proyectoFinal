<?php

use Illuminate\Database\Seeder;

class RestaurantesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['nombre' => 'La Gula de Sevilla', 'direccion' => 'Calle Regina', 'ciudad' => 'Sevilla', 'telefono' => '609212777', 'fecha_apertura' => '1999/07/28','imagen' => 'sevilla.jpg','id_menu' => 1],
            ['nombre' => 'La Gula de Madrid', 'direccion' => 'Calle Alcala', 'ciudad' => 'Madrid', 'telefono' => '609651502', 'fecha_apertura' => '2009/11/10','imagen' => 'madrid.jpg','id_menu' => 1],
            ['nombre' => 'La Gula de Barcelona', 'direccion' => 'Las Ramblas', 'ciudad' => 'Barcelona', 'telefono' => '692098112', 'fecha_apertura' => '2011/06/08','imagen' => 'barcelona.jpg','id_menu' => 1],
            ['nombre' => 'La Gula de Badajoz', 'direccion' => 'Calle Menacho', 'ciudad' => 'Badajoz', 'telefono' => '692543222', 'fecha_apertura' => '1998/11/01','imagen' => 'badajoz.jpg','id_menu' => 1],
            ['nombre' => 'La Gula de Almeria', 'direccion' => 'Paseo de Almeria', 'ciudad' => 'Almeria', 'telefono' => '632870177', 'fecha_apertura' => '2018/09/19','imagen' => 'almeria.jpg','id_menu' => 1],
            ['nombre' => 'La Gula de Valencia', 'direccion' => 'Calle la Paz', 'ciudad' => 'Valencia', 'telefono' => '636009122', 'fecha_apertura' => '2010/03/18','imagen' => 'valencia.jpg','id_menu' => 1],
            ['nombre' => 'La Gula de Murcia', 'direccion' => 'Plaza de las Flores', 'ciudad' => 'Murcia', 'telefono' => '636654990', 'fecha_apertura' => '2006/05/04','imagen' => 'murcia.jpg','id_menu' => 1],
            ['nombre' => 'La Gula de Zaragoza', 'direccion' => 'Paseo de la Independencia', 'ciudad' => 'Zaragoza', 'telefono' => '611855309', 'fecha_apertura' => '2007/03/31','imagen' => 'zaragoza.jpg','id_menu' => 1],
            ['nombre' => 'La Gula de Malaga', 'direccion' => 'Calle Larios', 'ciudad' => 'Malaga', 'telefono' => '637734888', 'fecha_apertura' => '2011/11/11','imagen' => 'malaga.jpg','id_menu' => 1],
            ['nombre' => 'La Gula de Bilbao', 'direccion' => 'Gran Via', 'ciudad' => 'Bilbao', 'telefono' => '636909558', 'fecha_apertura' => '2015/01/06','imagen' => 'bilbao.jpg','id_menu' => 1],
        ];
        DB::table('restaurantes')->insert($data);
    }
}
