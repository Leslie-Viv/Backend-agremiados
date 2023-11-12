<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{

    public function login(Request $request){
        try{
            $user=User::where ("email", $request->email)->first();
            if($user){
                if(Auth::attempt(["email"=>$request->email,"password"=>$request->password])){
                    $token=$user->createToken("Login app")->accessToken;
                    return response()->json(["success"=>true,"token"=>$token,"user"=>$user]);
                }
                return response()->json(["success"=>false,"message"=>"Contraseña incorrecta"]);
            }
            return response()->json(["success"=>false,"message"=>"El usuario no se ha encontrado"]);
        } catch(Exception $e){
            return response()->json(["success=>false","message"=>$e->getMessage()],500);
        }

    }

    public function user(Request $request){
        try{
            return response()->json(["success"=>true,"user"=>$request->user()]);

        }catch(Exception $e){
            return response()->json(["success"=> false, "message"=>$e->getMessage()],500);
        }
    }

    public function crearUsuario()
    {
        $nuevoUsuario = new User;
        $nuevoUsuario->name = 'Nombre';
        $nuevoUsuario->email = 'correo@example.com';
        $nuevoUsuario->password = bcrypt('contraseña');
        $nuevoUsuario->save();

        return 'Usuario creado correctamente';
    }

    //
}
