<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class agremiados extends Model
{
    use HasFactory;
    protected $fillable = [
        'apellidopaterno',
        'apellidomaterno',
         'nombres' ,
         'sexo',
         'NUP',
         'NUE',
         'RFC',
         'NSS',
        'fechadenacimiento',
         'telefono',
         'cuota'
    ];
}
