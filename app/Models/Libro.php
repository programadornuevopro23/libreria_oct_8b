<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    //Indicar los campos qeu el usuario puede modificar

    protected $fillable = ['nombre', 'autor', 'editorial', 'precio'];
}
