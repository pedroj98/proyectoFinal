<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();


        \DB::table('usuarios')->insert(array(

            'usuario' => 'administrador',
            'password' => Hash::make('12345678'),
            'email' => 'administrador@administrador.com',
            'direccion' => 'Calle de los Naranajos',
            'telefono' => '600287443',
            'imagen' => 'usuario.png',
            'id_role' => 1,
            'nombre' => $faker->firstName($gender = null),
            'apellidos' => $faker->lastName,
            'fecha_nacimiento' => $faker->date($format = 'Y-m-d', $max = '2000-12-31', $min = '1960-12-31'),
            'fecha_incorporacion' => $faker->date($format = 'Y-m-d', $max = 'now', $min = '1998-11-01'),
            'numero_seguridad_social' => $faker->ssn,
            'sueldo' => 0,
        ));


        $data = [
            ['usuario' => 'Cliente al Contado', 'imagen' => 'usuario.png', 'id_role' => 2]
        ];
        DB::table('usuarios')->insert($data);

        for ($i = 0; $i < 50; $i++) {

            \DB::table('usuarios')->insert(array(

                'usuario' => $faker->unique()->userName,
                'password' => Hash::make('12345678'),
                'email' => $faker->unique()->email,
                'direccion' => $faker->streetAddress,
                'telefono' => $faker->numberBetween($min = 600000000, $max = 699999999),
                'imagen' => 'usuario.png',
                'id_role' => $faker->numberBetween($min = 4, $max = 10),
                'nombre' => $faker->firstName($gender = null),
                'apellidos' => $faker->lastName,
                'fecha_nacimiento' => $faker->date($format = 'Y-m-d', $max = '2000-12-31', $min = '1960-12-31'),
                'fecha_incorporacion' => $faker->date($format = 'Y-m-d', $max = 'now', $min = '1998-11-01'),
                'numero_seguridad_social' => $faker->ssn,
                'sueldo' => $faker->randomFloat($nbMaxDecimals = 2, $min = 500, $max = 5000),
                'id_restaurante' => $faker->numberBetween($min = 1, $max = 10),



            ));
        }
        for ($i = 1; $i < 11; $i++) {

            \DB::table('usuarios')->insert(array(

                'usuario' => $faker->unique()->userName,
                'password' => Hash::make('12345678'),
                'email' => $faker->unique()->email,
                'direccion' => $faker->streetAddress,
                'telefono' => $faker->numberBetween($min = 600000000, $max = 699999999),
                'imagen' => 'usuario.png',
                'id_role' => 3,
                'nombre' => $faker->firstName($gender = null),
                'apellidos' => $faker->lastName,
                'fecha_nacimiento' => $faker->date($format = 'Y-m-d', $max = '2000-12-31', $min = '1960-12-31'),
                'fecha_incorporacion' => $faker->date($format = 'Y-m-d', $max = 'now', $min = '1998-11-01'),
                'numero_seguridad_social' => $faker->ssn,
                'sueldo' => $faker->randomFloat($nbMaxDecimals = 2, $min = 500, $max = 5000),
                'id_restaurante' => $i,



            ));
        }


        for ($i = 0; $i < 50; $i++) {

            \DB::table('usuarios')->insert(array(

                'usuario' => $faker->unique()->userName,
                'password' => Hash::make('12345678'),
                'email' => $faker->unique()->email,
                'direccion' => $faker->streetAddress,
                'telefono' => $faker->numberBetween($min = 600000000, $max = 699999999),
                'imagen' => 'usuario.png',
                'fecha_incorporacion' => $faker->date($format = 'Y-m-d', $max = 'now', $min = '1998-11-01'),
                'id_role' => 2

            ));
        }
    }
}
