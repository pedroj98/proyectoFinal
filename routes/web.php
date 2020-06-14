<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();


Route::get('/registro', function () {

    return View::make("auth.registro");
});

Route::get('/login', function () {

    return View::make("auth.login");
});

Route::post('/registro/crear', 'Auth\RegisterController@create');

Route::post('/login/store', 'Auth\LoginController@store');

Route::get('/login/destroy/{id}', 'Auth\LoginController@destroy');



Route::get("/", function () {
    return View::make("index");
});

Route::get('/restaurantes', 'HomeController@restaurantes');
Route::get('/restaurantes/{id}', 'HomeController@vistaRestaurante');


//rutas especificas para los ususarios

Route::group(['middleware' => 'esUsuario'], function () {



    Route::get('/criticas/crear/{id}', 'CriticaController@create');
    Route::post('/criticas/añadir', 'CriticaController@store');

    Route::get('/quejas/crear/{id}', 'QuejaController@create');
    Route::post('/quejas/añadir', 'QuejaController@store');

    Route::get('/reservas/crear/{id}', 'ReservaController@create');
    Route::post('/reservas/añadir', 'ReservaController@store')->name('post');

    Route::get('/pedidos/crear/{id}', 'PedidoController@create');
    Route::post('/pedidos/añadir', 'PedidoController@store')->name('post');

    Route::get('/menus/platos/filtro', 'MenuController@filtrar');

    Route::get('/clientes/editar', 'ClienteController@edit');
    Route::post('/clientes/actualizar/{id}', 'ClienteController@update');

    Route::post('/facturas/clientes/crear', 'FacturaClienteController@store')->name('post');
    Route::post('/facturas/clientes/platos/crear', 'FacturaClienteController@guardarPlatos')->name('post');
});


//rutas especificas para los administradores

Route::group(['middleware' => 'esAdmin'], function () {



    Route::get('/administrador/restaurantes', 'RestauranteController@index');
    Route::get('/administrador/restaurantes/crear', 'RestauranteController@create');
    Route::post('/administrador/restaurantes/añadir', 'RestauranteController@store');
    Route::get('/administrador/restaurantes/editar/{id}', 'RestauranteController@edit');
    Route::post('/administrador/restaurantes/actualizar/{id}', 'RestauranteController@update');
    Route::get('/administrador/restaurantes/eliminar/{id}', 'RestauranteController@destroy');
    Route::get('/administrador/restaurantes/ingredientes/{id}', 'RestauranteController@ingredientes');
    Route::get('/administrador/restaurantes/ingredientes/eliminar/{restaurante}/{ingrediente}', 'RestauranteController@eliminarIngrediente');


    Route::get('/administrador/restaurantes/mesas/crear/{id}', 'MesaController@create');
    Route::post('/administrador/restaurantes/mesas/añadir/', 'MesaController@store');
    Route::get('/administrador/restaurantes/mesas/{id}', 'MesaController@mesasRestaurante');
    Route::get('/administrador/restaurantes/mesas/eliminar/{id}', 'MesaController@destroy');
    Route::post('/administrador/restaurantes/mesas/cambiarSillas', 'MesaController@cambiarSillas')->name('post');


    Route::get('/administrador/empleados', 'EmpleadoController@index');
    Route::get('/administrador/empleados/crear', 'EmpleadoController@create');
    Route::post('/administrador/empleados/añadir', 'EmpleadoController@store');
    Route::post('/administrador/empleados/actualizar/{id}', 'EmpleadoController@update');
    Route::get('/administrador/empleados/editar/{id}', 'EmpleadoController@edit');
    Route::get('/administrador/empleados/eliminar/{id}', 'EmpleadoController@destroy');

    Route::get('/administrador/ingredientes', 'IngredienteController@index');
    Route::get('/administrador/ingredientes/crear', 'IngredienteController@create');
    Route::post('/administrador/ingredientes/añadir', 'IngredienteController@store');
    Route::post('/administrador/ingredientes/actualizar/{id}', 'IngredienteController@update');
    Route::get('/administrador/ingredientes/editar/{id}', 'IngredienteController@edit');
    Route::get('/administrador/ingredientes/eliminar/{id}', 'IngredienteController@destroy');

    Route::get('/administrador/criticas', 'CriticaController@index');
    Route::get('/administrador/criticas/revisar/{id}', 'CriticaController@evaluarCritica');
    Route::get('/administrador/criticas/aprobar/{id}', 'CriticaController@aprobarCritica');
    Route::get('/administrador/criticas/eliminar/{id}', 'CriticaController@destroy');

    Route::get('/administrador/quejas', 'QuejaController@index');
    Route::get('/administrador/quejas/eliminar/{id}', 'QuejaController@destroy');
    Route::get('/administrador/quejas/revisar/{id}', 'QuejaController@evaluarQueja');


    Route::get('/administrador/proveedores', 'ProveedorController@index');
    Route::get('/administrador/proveedores/crear', 'ProveedorController@create');
    Route::post('/administrador/proveedores/añadir', 'ProveedorController@store');
    Route::post('/administrador/proveedores/actualizar/{id}', 'ProveedorController@update');
    Route::get('/administrador/proveedores/editar/{id}', 'ProveedorController@edit');
    Route::get('/administrador/proveedores/eliminar/{id}', 'ProveedorController@destroy');
    Route::get('/administrador/proveedores/ingredientes/{id}', 'ProveedorController@ingredientes');
    Route::get('/administrador/proveedores/ingredientes/eliminar/{proveedor}/{ingrediente}', 'ProveedorController@eliminarIngrediente');



    Route::get('/administrador/clientes', 'ClienteController@index');
    Route::get('/administrador/clientes/eliminar/{id}', 'ClienteController@destroy');

    Route::get('/administrador/menus', 'MenuController@index');
    Route::get('/administrador/menus/crear', 'MenuController@create');
    Route::post('/administrador/menus/añadir', 'MenuController@store');
    Route::get('/administrador/menus/eliminar/{id}', 'MenuController@destroy');
    Route::post('/administrador/menus/actualizar/{id}', 'MenuController@update');
    Route::get('/administrador/menus/editar/{id}', 'MenuController@edit');
    Route::get('/administrador/menus/platos/{id}', 'MenuController@platos');
    Route::get('/administrador/menus/platos/editar/{id}', 'MenuController@editarCarta');
    Route::post('/administrador/menus/platos/añadir', 'MenuController@añadirPlato')->name('post');
    Route::post('/administrador/menus/platos/eliminar', 'MenuController@quitarPlato')->name('post');
    Route::get('/administrador/menus/platos/precio/{menu}/{plato}', 'MenuController@precioPlato');
    Route::post('/administrador/menus/platos/precio/actualizar', 'MenuController@updatePrecio');

    Route::get('/administrador/facturas/clientes/', 'FacturaClienteController@index');
    Route::get('/administrador/facturas/clientes/eliminar/{id}', 'FacturaClienteController@destroy');
    Route::get('/administrador/facturas/clientes/platos/{id}', 'FacturaClienteController@platos');

    Route::get('/administrador/facturas/proveedores/', 'FacturaProveedorController@index');
    Route::get('/administrador/facturas/proveedores/eliminar/{id}', 'FacturaProveedorController@destroy');
    Route::get('/administrador/facturas/proveedores/ingredientes/{id}', 'FacturaProveedorController@ingredientes');

    Route::get('/administrador/platos', 'PlatoController@index');
    Route::get('/administrador/platos/crear', 'PlatoController@create');
    Route::post('/administrador/platos/añadir', 'PlatoController@store');
    Route::post('/administrador/platos/actualizar/{id}', 'PlatoController@update');
    Route::get('/administrador/platos/editar/{id}', 'PlatoController@edit');
    Route::get('/administrador/platos/eliminar/{id}', 'PlatoController@destroy');
    Route::get('/administrador/platos/ingredientes/{id}', 'PlatoController@ingredientes');
    Route::post('/administrador/platos/ingredientes/eliminar', 'PlatoController@quitarIngrediente')->name('post');
    Route::post('/administrador/platos/ingredientes/añadir', 'PlatoController@añadirIngrediente')->name('post');
    Route::get('/administrador/platos/ingredientes/editar/{id}', 'PlatoController@editarIngredientes');

    Route::get('/administrador/reservas', 'ReservaController@index');
    Route::get('/administrador/reservas/eliminar/{id}', 'ReservaController@destroy');

    Route::get('/administrador/pedidos', 'PedidoController@index');
    Route::get('/administrador/pedidos/eliminar/{id}', 'PedidoController@destroy');

    Route::get('/administrador/editar', 'EmpleadoController@editarPerfil');
    Route::post('/administrador/actualizar/{id}', 'EmpleadoController@actualizarPerfil');
});


//rutas especificas para los camareros

Route::group(['middleware' => 'esCamarero'], function () {

    Route::get('/camarero/editar', 'EmpleadoController@editarPerfil');
    Route::post('/camarero/actualizar/{id}', 'EmpleadoController@actualizarPerfil');

    Route::get('/camarero/terminal', 'FacturaClienteController@create');
    Route::post('/camarero/facturas/clientes/crear', 'FacturaClienteController@store')->name('post');
    Route::post('/camarero/facturas/clientes/platos/crear', 'FacturaClienteController@guardarPlatos')->name('post');
});
