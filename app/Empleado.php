<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Empleado extends Model
{

    protected $table = 'usuarios';
    public $timestamps = false;
    protected $fillable = ['sueldo'];

    //devuelve el restaurante en el que trabaja el empleado
    public function restaurante()
    {
        return $this->belongsTo(Restaurante::class,'id_restaurante');
    }

    //devuelve el role del empleado
    public function role()
    {
        return $this->belongsTo(Role::class, 'id_role');
    }
}
