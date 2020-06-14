<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }



    /**
     * crea un nuevo usuario, en este caso un cliente y lo logea
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(Request $request)
    {

        $errores = array();

        if (User::where('usuario', '=', $request->usuario)->exists()) {

            $errores[] = 'el nombre de usuario indicado ya se encuentra en uso';
        }

        if (User::where('email', '=', $request->email)->exists()) {

            $errores[] = 'ya existe un usuario con ese email';
        }

        if ($request->password != $request->repass) {

            $errores[] = 'la contraseña y la confirmacion de contraseña deben ser iguales';
        }


        if (empty($errores)) {

            $pass = Hash::make($request['password']);

            if (isset($request->imagen)) {

                $imagen = $request->imagen;
                $nombre = $imagen->getClientOriginalName();
                $imagen->move('images', $nombre);
            } else {
                $nombre = 'usuario.png';
            }

            $data = array(
                'usuario' => $request['usuario'], "password" => $pass, 'fecha_incorporacion' => date('Y-m-d'),
                "email" => $request['email'], 'telefono' => $request['telefono'], 'direccion' => $request['direccion'],
                'imagen' => $nombre, 'id_role' => 2
            );

            $user = User::create($data);

            auth()->login($user);

            return redirect()->to('/restaurantes');
        } else {

            return redirect()->back()->withErrors($errores);
        }
    }
}
