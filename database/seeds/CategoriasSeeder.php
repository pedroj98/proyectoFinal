<?php

use Illuminate\Database\Seeder;

class CategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
     {
         $data = [
             ['nombre'=>'desayunos'],
             ['nombre'=>'entrantes'],
             ['nombre'=>'platos_principales'],
             ['nombre'=>'sopas'],
             ['nombre'=>'postres'],

         ];
         DB::table('categorias')->insert($data);
     }
}
