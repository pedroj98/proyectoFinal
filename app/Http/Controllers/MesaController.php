<?php

namespace App\Http\Controllers;

use App\Mesa;
use App\Restaurante;
use DB;



use Illuminate\Http\Request;

class MesaController extends Controller
{

    /**
     * Muestra las mesas de un restaurante en concreto
     *
     * @param  int  $id identificador del restaurante
     * @return \Illuminate\Http\Response una vista con todas las mesas de un restaurante
     */
    public function mesasRestaurante($id)
    {
        $mesas = Mesa::where('id_restaurante', $id)->get();
        $restaurante = Restaurante::find($id);
        return view('administrador.mesasRestaurantes', compact('mesas', 'restaurante'));
    }

    /**
     * Modifica las sillas de una mesa
     *
     *  @param  \Illuminate\Http\Request  $request informacion del formulario
     */
    public function cambiarSillas(Request $request)
    {
        $id = $request->id; //identificador de la mesa
        $sillas = $request->sillas; //numero de sillas que la van ha componer

        DB::table('mesas')
            ->where('id', $id)
            ->update(['num_sillas' => $sillas]);
    }


    /**
     * muestra un formulario para crear nuevas mesas en un restaurante en concreto
     * 
     * @param  int  $id identificador del restaurante
     * @return \Illuminate\Http\Response una vista con dicho formulario
     */
    public function create($id)
    {
        $restaurante = Restaurante::find($id);
        return view('administrador.crearMesa')->with(['restaurante' => $restaurante]);
    }

    /**
     * almacena en la base de datos la informacion de las nuevas mesas
     *
     * @param  \Illuminate\Http\Request  $request informacion del formulario
     * @return \Illuminate\Http\Response una vista con todas las mesas de un determinado restaurante
     */
    public function store(Request $request)
    {
        $restaurante = $request->restaurante; //restaurante al que van ha pertenecer
        $mesas = $request->mesas; //numero de mesas que se van ha añadir
        $sillas = $request->sillas; //numero de sillas que va ha contener cada una

        for ($i = 1; $i <= $mesas; $i++) {

            DB::table('mesas')->insert([
                ['id_restaurante' => $restaurante, 'num_sillas' => $sillas]
            ]);
        }

        return redirect("/administrador/restaurantes/mesas/$restaurante");
    }


    /**
     * elimina una mesa 
     *
     * @param  int  $id identificador de la mesa
     * @return \Illuminate\Http\Response una vista todas las mesas del restaurante al que pertenecia la mesa anterior
     */
    public function destroy($id)
    {
        $mesa = Mesa::find($id);
        $restaurante = $mesa->restaurante->id;

        $mesa->delete();

        return redirect("/administrador/restaurantes/mesas/$restaurante");
    }
}
