<?php

namespace App\Http\Controllers;

use App\Restaurante;
use App\Critica;
use App\Empleado;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Muestra todos los restaurantes
     *
     * @return \Illuminate\Http\Response
     */
    public function restaurantes()
    {
        $restaurantes =  Restaurante::all();
        return view('restaurantes')->with(['restaurantes' => $restaurantes]);
    }

    /**
     * Devuelve la vista de un restaurante en concreto
     *
     * @return \Illuminate\Http\Response
     */
    public function vistaRestaurante($id)
    {
        $restaurante = Restaurante::find($id);
        $criticas = Critica::where('id_restaurante', $restaurante->id)->where('estado','aprobada')->orderBy('fecha', 'desc')->take(5)->get();
        return view('restauranteVista', compact('restaurante', 'criticas'));
    }

   
}
