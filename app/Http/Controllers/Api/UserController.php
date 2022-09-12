<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(Request $request){
        $request->validate([
            'username' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'nombre' => 'required',
            'apellidopaterno' => 'required',
            'apellidomaterno' => 'required',
            'telefonopersonal' => 'required',
            'fechanacimiento' => 'required',
            'edad' => 'required',
            'genero' => 'required',
        ]);

        $user =new User();
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->nombre = $request->nombre;
        $user->apellidopaterno = $request->apellidopaterno;
        $user->apellidomaterno = $request->apellidomaterno;
        $user->telefonopersonal = $request->telefonopersonal;
        $user->fechanacimiento = $request->fechanacimiento;
        $user->edad = $request->edad;
        $user->genero = $request->genero;

        /*
        {
            "username" : "josdav",
            "email" : "josdav@gmail.com",
            "password" : "123456",
            "nombre" : "josue",
            "apellidopaterno" : "sarmiento",
            "apellidomaterno" : "montero",
            "telefonopersonal" : "96112345678",
            "fechanacimiento" : "2000-10-04",
            "edad" : "21",
            "genero" : "masculino",              
        }
        */
        $user->save();

        return response()->json([
            "status" =>1,
            "msg" => "Registro exitoso",
        ]);
    }

    public function login(Request $request){
        $request->validate([
            "email" => "required|email",
            "password" => "required"
        ]);

        $user = User::where("email", "=", $request->email)->first();

        if( isset($user->id) ){
            if(Hash::check($request->password, $user->password)){
                //token creado
                $token = $user->createToken("auth_token")->plainTextToken;

                return response()->json([
                    "status" =>1,
                    "msg" => "Usuario logueado",
                    "access_token" => $token
                ]);
            }else{
                return response()->json([
                    "status" => 0,
                    "msg" => "La contraseña es incorrecta",
                ], 404);
            }
            
        }else{
            return response()->json([
                "status" => 0,
                "msg" => "Usuario no registrado",
            ], 404);
        }
    }

    public function userProfile(){
        return response()->json([
            "status" => 1,
            "msg" => "Acerca del usuario",
            "data"=> auth()->user()
        ]);
    }

    public function logout(){
        auth()->user()->tokens()->delete();
        return response()->json([
            "status" => 1,
            "msg" => "Cerró sesión",
        ]);
    }

    public function delete(){
        $user_id= auth()->user()->id;
        if(User::where(["id" => $user_id])->exists()){
            $user = User::where(["id" => $user_id])->first();
            
            $user->delete();
            return response()->json([
                "status" => 1,
                "msg" => "Especialidad eliminada",
            ]);
        }else{
            return response()->json([
                "Status" => 0,
                "msg" => "No se encontró dicha especialidad"
            ], 404);
        }
    }
}
