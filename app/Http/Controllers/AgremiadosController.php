<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Agremiados;


class AgremiadosController extends Controller
{
    //

    public function nuevoagremiado(Request $request){
        $validator=Validator::make ($request-> all(),[
            'apellidopaterno'=> 'string | max:50',
           'apellidomaterno'=> 'string | max:50',
            'nombres'=> 'string | max:50',
            'sexo'=> 'string | max:50',
            'NUP'=> 'string | max:50',
            'NUE'=> 'string | max:50',
            'RFC'=> 'string | max:50',
            'NSS'=> 'string | max:50',
           'fechadenacimiento'=> 'string | max:50',
            'telefono'=> 'string | max:10',
            'cuota'=> 'numeric'
        ]);

        if($validator->fails()){
            return response()-> json(['Errors'=>$validator->errors()],422);
        }
        $agremiado=Agremiados::create([
            'apellidopaterno'=> $request->apellidopaterno,
            'apellidomaterno'=>  $request->apellidomaterno,
             'nombres'=>  $request->nombres,
             'sexo'=>  $request->sexo,
             'NUP'=>  $request->NUP,
             'NUE'=>  $request->NUE,
             'RFC'=>  $request->RFC,
             'NSS'=>  $request->NSS,
            'fechadenacimiento'=>  $request->fechadenacimiento,
             'telefono'=>  $request->telefono,
             'cuota'=>  $request->cuota 
        ]);

        return response()-> json(['Agremiado'=>$agremiado],201);

    }

    public function getAgremiado(){
        return response()->json(Agremiados::all(), 200);
    }

}
