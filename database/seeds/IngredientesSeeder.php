<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class IngredientesSeeder extends Seeder
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

        for ($i = 0; $i < 10; $i++) {

            \DB::table('ingredientes')->insert(array(

                'codigo' => $faker->unique()->isbn10(),
                'nombre' => $faker->unique()->dairyName()
            ));
        }
        for ($i = 0; $i < 22; $i++) {

            \DB::table('ingredientes')->insert(array(

                'codigo' => $faker->unique()->isbn10(),
                'nombre' => $faker->unique()->vegetableName()
            ));
        }

        for ($i = 0; $i < 23; $i++) {

            \DB::table('ingredientes')->insert(array(

                'codigo' => $faker->unique()->isbn10(),
                'nombre' => $faker->unique()->fruitName()
            ));
        }

        for ($i = 0; $i < 12; $i++) {

            \DB::table('ingredientes')->insert(array(

                'codigo' => $faker->unique()->isbn10(),
                'nombre' => $faker->unique()->meatName()
            ));
        }

        for ($i = 0; $i < 10; $i++) {

            \DB::table('ingredientes')->insert(array(

                'codigo' => $faker->unique()->isbn10(),
                'nombre' => $faker->unique()->sauceName()
            ));
        }

        for ($i = 0; $i < 100; $i++) {

            \DB::table('ingredientes_platos')->insert(array(

                'id_plato' => $faker->numberBetween($min = 1, $max = 27),
                'id_ingrediente' => $faker->numberBetween($min = 1, $max = 77)
            ));
        }

        for ($i = 0; $i < 100; $i++) {

            \DB::table('ingredientes_proveedores')->insert(array(

                'id_proveedor' => $faker->numberBetween($min = 1, $max = 15),
                'id_ingrediente' => $faker->numberBetween($min = 1, $max = 77),
                'precio' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0.5, $max = 10)
            ));
        }

        for ($i = 0; $i < 100; $i++) {

            \DB::table('ingredientes_restaurantes')->insert(array(

                'id_restaurante' => $faker->numberBetween($min = 1, $max = 10),
                'id_ingrediente' => $faker->numberBetween($min = 1, $max = 77),
                'cantidad' => $faker->numberBetween($min = 1, $max = 200)
            ));
        }
    }
}
