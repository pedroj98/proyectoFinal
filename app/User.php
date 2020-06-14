<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\facades\Auth;

class User extends Authenticatable
{
    protected $table = 'usuarios';
    public $timestamps = false;

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'usuario', 'password', 'email', 'direccion', 'fecha_nacimiento', 'imagen', 'fecha_incorporacion', 'telefono',
        'id_role', 'nombre', 'apellidos', 'fecha_nacimiento', 'numero_seguridad_social', 'sueldo', 'id_restaurante'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role()
    {

        return $this->belongsTo('App\Role', 'id_role');
    }

    public function restaurante()
    {
        return $this->belongsTo(Restaurante::class,'id_restaurante');
    }

    public function esAdmin()
    {

        if ($this->role->nombre == 'administrador') {

            return true;
        }
        return false;
    }

    public function esUsuario()
    {

        if ($this->role->nombre == 'usuario') {

            return true;
        }
        return false;
    }

    public function esCamarero()
    {

        if ($this->role->nombre == 'camarero') {

            return true;
        }
        return false;
    }
}
