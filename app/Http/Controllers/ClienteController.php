<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Cliente;
use Illuminate\Support\Facades\Hash;

class ClienteController extends Controller
{
    /**
     * muestra una lista de todos los clientes registrados
     *
     * @return \Illuminate\Http\Response devuelve una vista con todos los clientes
     */
    public function index()
    {
        //todos los usuarios con el rol de usuario excepto el cliente al contado
        $clientes =  Cliente::where('id_role', 2)->where('id', '!=', 2)->get();
        return view('administrador.clientes')->with(['clientes' => $clientes]);
    }

    /**
     * muestra un formulario para que los usuarios registrados puedan editar su perfil
     *
     * 
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('usuario.editarPerfil');
    }

    /**
     * actualiza la informacion de un cliente en la base de datos
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $errores = array();

        if (Cliente::where('usuario', '=', $request->usuario)->exists() && Cliente::find($id)->usuario != $request->usuario) {

            $errores[] = 'el nombre de usuario ya esta siendo utilizado';
        }

        if (Cliente::where('email', '=', $request->email)->exists() && Cliente::find($id)->email != $request->email) {

            $errores[] = 'ya existe un usuario con ese email';
        }



        if (empty($errores)) {


            if (isset($request->imagen)) {

                $imagen = $request->imagen;
                $nombre = $imagen->getClientOriginalName();
                $imagen->move('images', $nombre);

                $cliente = Cliente::find($id);
                $cliente->imagen = $nombre;
                $cliente->save();
            }

            if (isset($request->password)) {

                $password =  Hash::make($request->password);
                $cliente = Cliente::find($id);
                $cliente->password = $password;
                $cliente->save();
            }

            $data = array(
                'usuario' => $request['usuario'], "direccion" => $request['direccion'],
                "telefono" => $request['telefono'],  'email' => $request['email']
            );


            Cliente::whereId($id)->update($data);

            return redirect("/");
        } else {

            return redirect()->back()->withErrors($errores);
        }
    }

    /**
     * Elimina un cliente de la base de datos
     *
     * @param  int  $id identificador del cliente
     * @return \Illuminate\Http\Response una vista con todos los clientes
     */
    public function destroy($id)
    {
        Cliente::find($id)->delete();

        return redirect("/administrador/clientes");
    }
}
