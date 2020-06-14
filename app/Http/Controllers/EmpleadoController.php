<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use App\Empleado;
use App\Restaurante;
use App\Role;
use DB;

class EmpleadoController extends Controller
{
    /**
     * muestra por pantalla todos los empleados de todos los restaurantes
     *
     * @return \Illuminate\Http\Response devuelve todos los empleados
     */
    public function index()
    {
        $empleados =  Empleado::where('id_role', '>', 2)->get();
        return view('administrador.empleados')->with(['empleados' => $empleados]);
    }

    /**
     * devuelve un formulario para dar de alta a un empleado
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $restaurantes = Restaurante::all();
        $roles = Role::where('id', '!=', 2)->get();
        return view('administrador.crearEmpleado', compact('restaurantes', 'roles'));
    }

    /**
     * almacena un empleado en la base de datos
     *
     * @param  \Illuminate\Http\Request  datos recibidos del formulario
     * @return \Illuminate\Http\Response vista empleados
     */
    public function store(Request $request)
    {

        $errores = array();

        if (Empleado::where('usuario', '=', $request->usuario)->exists()) {

            $errores[] = 'el nombre de usuario ya esta siendo utilizado';
        }

        if (Empleado::where('email', '=', $request->email)->exists()) {

            $errores[] = 'ya existe un usuario con ese email';
        }

        if ((Role::find($request->role))->nombre == 'gerente' && Restaurante::find($request->restaurante)->gerente->count() == 1) {

            $errores[] = 'el restaurante indicado ya cuenta con un gerente';
        }



        if (empty($errores)) {


            //si no tiene imagen se le asigna una por defecto
            if (isset($request->imagen)) {

                $imagen = $request->imagen;
                $nombre = $imagen->getClientOriginalName();
                $imagen->move('images', $nombre);
            } else {
                $nombre = 'usuario.png';
            }

            $data = array(
                'nombre' => $request['nombre'], "apellidos" => $request['apellidos'], 'usuario' => $request['usuario'],
                "fecha_nacimiento" => $request['fecha_nacimiento'], "numero_seguridad_social" => $request['numero_seguridad_social'],
                "direccion" => $request['direccion'], "telefono" => $request['telefono'],
                "id_restaurante" => $request['restaurante'], "id_role" => $request['role'],
                'usuario' => $request['usuario'], 'password' => Hash::make($request['password']), 'email' => $request['email'], 'fecha_incorporacion' => date('Y-m-d'),
                'imagen' => $nombre, 'sueldo' => $request['sueldo']
            );
            DB::table('usuarios')->insert($data);

            //si no se ha especificado cuanto dinero va ha percibir se le asinga uno por defecto dependiendo
            //del cargo que valla a desempeñar
            if ($request['sueldo'] == '') {

                $empleado = Empleado::orderBy('id', 'DESC')->first();
                $empleado->update(array('sueldo' => $empleado->role->sueldo_base));
                $empleado->save();
            }
            return redirect("/administrador/empleados");
        } else {

            return redirect()->back()->withErrors($errores);
        }
    }


    /**
     * muestra un formulario para modificar la informacion de un empleado
     *
     * @param  int  $id identificador del empleado que se va ha modificar
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empleado = Empleado::find($id);
        $restaurantes = Restaurante::all();
        $roles = Role::where('id', '!=', 2)->get();
        return view('administrador.editarEmpleado', compact('roles', 'empleado', 'restaurantes'));
    }

    /**
     * Actualiza la informacion de un empleado
     *
     * @param  \Illuminate\Http\Request  $request informacion recibida del formulario
     * @param  int  $id identificador del empleado
     * @return \Illuminate\Http\Response muestra una vista con todos los empleados
     */
    public function update(Request $request, $id)
    {

        $errores = array();

        if ((Role::find($request->role))->nombre == 'gerente' && Restaurante::find($request->restaurante)->gerente->count() == 1) {


            if (Restaurante::find($request->restaurante)->gerente->first()->usuario != Empleado::find($id)->usuario) {

                $errores[] = 'el restaurante indicado ya cuenta con un gerente';
            }
        }

        if (empty($errores)) {


            if (isset($request->imagen)) {

                $imagen = $request->imagen;
                $nombre = $imagen->getClientOriginalName();
                $imagen->move('images', $nombre);

                $empleado = Empleado::find($id);
                $empleado->imagen = $nombre;
                $empleado->save();
            }

            $data = array(
                'nombre' => $request['nombre'], "apellidos" => $request['apellidos'],
                "fecha_nacimiento" => $request['fecha_nacimiento'], "numero_seguridad_social" => $request['numero_seguridad_social'],
                "direccion" => $request['direccion'], "telefono" => $request['telefono'],
                "id_restaurante" => $request['restaurante'], "id_role" => $request['role'],
                'usuario' => $request['usuario'], 'password' => Hash::make($request['password']), 'email' => $request['email'], 'fecha_incorporacion' => date('Y-m-d'),
                'sueldo' => $request['sueldo']
            );


            Empleado::whereId($id)->update($data);

            //si no se le ha especificado el salario se le asigna uno en funcion de su role
            if ($request['sueldo'] == '') {

                $empleado = Empleado::find($id);
                $empleado->update(array('sueldo' => $empleado->role->sueldo_base));
                $empleado->save();
            }

            return redirect("/administrador/empleados");
        } else {

            return redirect()->back()->withErrors($errores);
        }
    }

    /**
     * elimina un empleado de la base de datos
     *
     * @param  int  $id identificador del empleado
     * @return \Illuminate\Http\Response devuelve una vista con todos los empleados
     */
    public function destroy($id)
    {
        Empleado::find($id)->delete();

        return redirect("/administrador/empleados");
    }


    /**
     * muestra un formulario para que un empleado pueda editar su perfil
     *
     * 
     * @return \Illuminate\Http\Response
     */
    public function editarPerfil()
    {
        if (auth()->user()->role->nombre == 'administrador') {

            return view('administrador.editarPerfil');
        }

        if (auth()->user()->role->nombre == 'camarero') {

            return view('camarero.editarPerfil');
        }
    }

    /**
     * Actualiza el perfil de un empleado
     *@param  int  $id identificador del empleado
     * @param  \Illuminate\Http\Request  $request informacion recibida del formulario
     * @return \Illuminate\Http\Response devulve la vista anterior
     */
    public function actualizarPerfil(Request $request, $id)
    {

        $errores = array();

        if (Empleado::where('usuario', '=', $request->usuario)->exists() && Empleado::find($id)->usuario != $request->usuario) {

            $errores[] = 'el nombre de usuario ya esta siendo utilizado';
        }

        if (Empleado::where('email', '=', $request->email)->exists() && Empleado::find($id)->email != $request->email) {

            $errores[] = 'ya existe un usuario con ese email';
        }

        if (empty($errores)) {


            if (isset($request->imagen)) {

                $imagen = $request->imagen;
                $nombre = $imagen->getClientOriginalName();
                $imagen->move('images', $nombre);

                $empleado = Empleado::find($id);
                $empleado->imagen = $nombre;
                $empleado->save();
            }

            if (isset($request->password)) {

                $password =  Hash::make($request->password);
                $empleado = Empleado::find($id);
                $empleado->password = $password;
                $empleado->save();
            }


            $data = array(
                'usuario' => $request['usuario'], "direccion" => $request['direccion'],
                "telefono" => $request['telefono'],  'email' => $request['email']
            );


            Empleado::whereId($id)->update($data);

            return redirect()->back()->with('message', 'perfil actualizado exitosamente');
        } else {

            return redirect()->back()->withErrors($errores);
        }
    }
}
