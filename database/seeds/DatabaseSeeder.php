<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call('RolesSeeder');
        $this->call('CategoriasSeeder');
        $this->call('PlatosSeeder');
        $this->call('ProveedoresSeeder');
        $this->call('MenusSeeder');
        $this->call('RestaurantesSeeder');
        $this->call('IngredientesSeeder');
        $this->call('UsuariosSeeder');
        $this->call('MesasSeeder');
        $this->call('FacturasProveedoresSeeder');
        $this->call('FacturasClientesSeeder');
        $this->call('ReservasSeeder');
    }
}
