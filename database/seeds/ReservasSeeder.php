<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ReservasSeeder extends Seeder
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

            \DB::table('reservas')->insert(array(

                'id_cliente' => $faker->numberBetween($min = 85, $max = 110),
                'fecha' => $faker->date($format = 'Y-m-d', $max = 'now'),
                'hora' => $faker->time($format = 'H:i:s', $max = 'now'),
                'id_mesa' => $faker->numberBetween($min = 1, $max = 50),
                'num_comensales' => $faker->numberBetween($min = 1, $max = 10)
            ));
        }
    }
}
