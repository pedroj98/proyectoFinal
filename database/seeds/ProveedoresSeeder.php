<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ProveedoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 15; $i++) {

            \DB::table('proveedores')->insert(array(

                'nombre' => $faker->company(),
                'pais' => $faker->country(),
                'direccion' => $faker->address(),
                'email' => $faker->email(),
                'telefono' => $faker->numberBetween($min = 600000000, $max = 699999999)
            ));
        }
    }
}
