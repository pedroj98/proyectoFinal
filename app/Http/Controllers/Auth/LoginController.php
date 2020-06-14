<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\Hash;



class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * intenta logear a un usuario
     *
     * @return void
     */
    public function __construct()
    {
    }

    public function store(Request $request)
    {

        if ((Auth::attempt(array('email' => $request->email, 'password' => $request->password)))) {


            if (auth()->user()->role->nombre == 'administrador') {

                return redirect()->to('/administrador/restaurantes');
            }
            if (auth()->user()->role->nombre == 'camarero') {

                return redirect()->to('/camarero/terminal');
            }
            return redirect()->to('/restaurantes');
        } else {
            return redirect()->back()->withErrors('el email y la contraseña son incorrectos');
        }
    }

    //cierra la sesion de un usuario
    public function destroy()
    {
        auth()->logout();

        return redirect()->to('/');
    }
}
