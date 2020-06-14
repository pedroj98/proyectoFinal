<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class MesasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 50; $i++) {

            \DB::table('mesas')->insert(array(

                'num_sillas' => $faker->numberBetween($min = 2, $max = 12),
                'id_restaurante'=> $faker->numberBetween($min = 1, $max = 10),

            ));
        
        }
    }
}
