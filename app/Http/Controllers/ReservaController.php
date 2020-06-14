<?php

namespace App\Http\Controllers;

use Illuminate\Support\facades\Mail;
use Illuminate\Http\Request;
use App\Reserva;
use App\Mesa;
use App\Restaurante;
use Auth;
use DB;



class ReservaController extends Controller
{
    /**
     * muestra una lista de todas las reservas de la base de datos
     *
     * @return \Illuminate\Http\Response una vista con la informacion de todas las reservas
     */
    public function index()
    {
        $reservas =  Reserva::all();
        return view('administrador.reservas')->with(['reservas' => $reservas]);
    }

    /**
     * muestra un formulario para que un usuario registrado haga una reserva
     *
     * @return \Illuminate\Http\Response un formulario para realizar la reserva
     */
    public function create($id)
    {
        $restaurante = Restaurante::find($id);
        return view('usuario.crearReserva')->with(['restaurante' => $restaurante]);
    }

    /**
     * almacena una nueva reserva en la base de datos 
     *
     * @param  \Illuminate\Http\Request  $request informacion obtenida del formulario
     */
    public function store(Request $request)
    {

        $comensales = $request->comensales;
        $restaurante = $request->restaurante;
        $fecha = $request->fecha;
        $hora = $request->hora;
 
        //se busca todas las mesas del restaurante especificado con suficientes sillas para todos los comensales
        $mesas = Mesa::where('num_sillas', '>=', $comensales)->where('id_restaurante', $restaurante)->get();

        //se evaluan las mesas una por una para averiguar si ya hay una reserva en la fecha y horas especificadas
        //si se encuentra una mesa disponible en ese dia y hora se realiza la reserva y se le informa al usuario el resultado del proceso
        foreach ($mesas as $mesa) {

            $ocupada = $mesa->reservas->where('hora', '=', $hora)->where('fecha', '=', $fecha)->first();

            if (!isset($ocupada)) {


                $data = array(
                    'id_cliente' => Auth::user()->id, "num_comensales" => $comensales,
                    "fecha" => $fecha, "hora" => $hora, "id_mesa" => $mesa->id,
                );
                DB::table('reservas')->insert($data);
                return response()->json(['success' => 'Su reserva ha sido realizada']);
            }
        }
        return response()->json(['success' => 'Lo sentimos, todas nuestras mesas estan ocupadas, pruebe un poco mas tarde']);
    }



    /**
     * se elimina una reserva de la base de datos 
     *
     * @param  int  $id identificador de la reserva
     * @return \Illuminate\Http\Response una vista con la informacion de todas las reservas de la base de datos
     */
    public function destroy($id)
    {

        $reserva = Reserva::find($id);

        $fechaActual = date("Y-m-d");

        //si la reserva corresponde a una fecha venidera se le manda un email al cliente notificandole que su reserva ha sido cancelada
        if ($fechaActual > $reserva->fecha) {

            $reserva->delete();
        } else {

            $datos = [
                'titulo' => 'Reserva Cancelada',
                'contenido' => "Lamentamos informarle que nos hemos visto obligados ha cancelar la reserva que 
                tenia prevista el dia $reserva->fecha a las $reserva->hora debido a un contratiempo de ultima hora
                si desea realizar una consulta tiene a su disposicion nuestro numero de telefono en nuestra pagina web junto a un enlace para que realice una queja sobre nuestros servicios
                . Lamentamos las molestias",


            ];

            Mail::send('emails.correo', $datos, function ($mensaje) use ($reserva) {


                $mensaje->subject('Reserva Cancelada');
                $mensaje->to($reserva->cliente->email);
            });

            $reserva->delete();
        }



        return redirect("/administrador/reservas");
    }
}
