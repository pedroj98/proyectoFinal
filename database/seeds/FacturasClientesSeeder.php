<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class FacturasClientesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 20; $i++) {

            \DB::table('facturas_clientes')->insert(array(

                'id_cliente' => $faker->numberBetween($min = 3, $max = 50),
                'fecha' => $faker->dateTimeThisYear($max = 'now', $timezone = null),
                'id_empleado' => $faker->numberBetween($min = 3, $max = 50),
                'id_restaurante' => $faker->numberBetween($min = 1, $max = 10),
                'total' => $faker->randomFloat($nbMaxDecimals = 2, $min = 1, $max = 500)
            ));
        }

        for ($i = 0; $i < 100; $i++) {

            \DB::table('platos_facturas')->insert(array(

                'id_plato' => $faker->numberBetween($min = 1, $max = 27),
                'cantidad' => $faker->numberBetween($min = 1, $max = 10),
                'id_factura' => $faker->numberBetween($min = 1, $max = 20),
                'precio' => $faker->randomFloat($nbMaxDecimals = 2, $min = 1, $max = 100),
            ));
        }
    }
}
