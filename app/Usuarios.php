<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;


class Usuarios extends Model
{

    
       protected $fillable = [
        'matricula','senha','email','nome','telefone'
    ];
    
    
}
