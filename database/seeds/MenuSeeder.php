<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class MenusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $data = [
            ['nombre' => 'Menu Gourmet'], ['nombre' => 'Menu Primaveral'], ['nombre' => 'Menu Multicultural'],
            ['nombre' => 'Menu Andaluz'], ['nombre' => 'Menu Navideño'], ['nombre' => 'Menu Standar']

        ];
        DB::table('menus')->insert($data);

        for ($i = 0; $i < 27; $i++) {

            \DB::table('menu_platos')->insert(array(

                'id_plato' => $faker->unique()->numberBetween($min = 1, $max = 27),
                'id_menu' => 1,
                'precio' => $faker->randomFloat($nbMaxDecimals = 2, $min = 7, $max = 80)
            ));
        }
    }
}
