<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(Request $request){
        try {
            $user = User::find(1);
            
            $todolodemas = [];

            if($user->puede($user,'')){
                DB::beginTransaction();
            }
        } catch (\Throwable $th) {
            //throw $th;
        }    
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

    /*
    {
        "email" : "josdav@gmail.com",
        "password" : "123456",
    }
    */

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
            $user = User::where(["id" => $user_id]);
            
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

    public function deleteUser(Request $request, $id){
        $user_id= auth()->user()->id;
        if(User::where(["id" => $user_id])->exists()){

            $eliminar_id = $request->id;
            $user = User::find($eliminar_id);
            
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

    public function update(Request $request, $id){
        $user_id = auth()->user()->id;
        if(User::where(["id" => $user_id])->exists()){
            $user = User::find($id);
            $user->username = $request->username;
            $user->email = isset($request->email) ? $request->email : $user->email;
            $user->password = Hash::make(isset($request->password) ? $request->password : $user->password);
            $user->nombre = isset($request->nombre)? $request->nombre : $user->nombre;
            $user->apellidopaterno = isset($request->apellidopaterno) ? $request->apellidopaterno : $user->apellidopaterno;
            $user->apellidomaterno = isset($request->apellidomaterno) ? $request->apellidomaterno : $user->apellidomaterno;
            $user->telefonopersonal = isset($request->telefonopersonal) ? $request->telefonopersonal : $user->telefonopersonal;
            $user->fechanacimiento = isset($request->fechanacimiento) ? $request->fechanacimiento : $user->fechanacimiento;
            $user->edad = isset($request->edad) ? $request->edad : $user->edad;
            $user->genero = isset($request->genero) ? $request->genero : $user->genero;

            $user->save();

            return response()->json([
                "status" => 1,
                "msg" =>"El usuario ha sido actualizado"
            ],);
        }else{
            return response()->json([
                "status" => 0,
                "msg" =>"No se puede"
            ],404);
        }
    }
}
