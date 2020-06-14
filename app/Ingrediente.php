<?php

namespace App;

use Illuminate\Database\Eloquent\Model;



class Ingrediente extends Model

{
    protected $table = 'ingredientes';
    public $timestamps = false;
    protected $fillable = ['nombre','codigo'];
}
