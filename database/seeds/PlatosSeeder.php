<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PlatosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $faker->addProvider(new \FakerRestaurant\Provider\es_PE\Restaurant($faker));

        for ($i = 0; $i < 27; $i++) {

            \DB::table('platos')->insert(array(

                'nombre' => $faker->unique()->foodName(),
                'descripcion' => $faker->text($maxNbChars = 200),
                'imagen' => 'plato.png',
                'id_categoria' => $faker->numberBetween($min = 1, $max = 5),

            ));
        }
    }
}
