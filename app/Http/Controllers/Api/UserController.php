<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\FormatterController as Formatear;
use App\Models\Permiso;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(Request $request){
        try {
            $user_id = auth()->user()->id;
            /* $user = User::find(1); */
            
            $todolodemas = [];

            if($user_id->puede($user_id,'cliente','c'))
            {
                DB::beginTransaction(); //IMPORTANTE AGREGAR
        
                /* // Si el request NO trae array
                $recurso->username = $request->username;
                $recurso->email = $request->email;
                $recurso->password = $request->password;
                $recurso->nombre = $request->nombre;
                $recurso->apellidomaterno = $request->apellidomaterno;
                $recurso->apellidopaterno = $request->apellidopaterno;
                $recurso->telefonopersonal = $request->telefonopersonal;
                $recurso->fechanacimiento = $request->fechanacimiento;
                $recurso->edad = $request->edad;
                $request->genero = $request->genero;
                $recurso->save(); */

                //Si request llega con un array
                if($request->user){
                    foreach($request->usuario as $usuario){
                        $recurso = new User;
                        $recurso->user_id = $usuario['user_id'];
                        $recurso->username = $usuario['username'];
                        $recurso->email = $usuario['email'];
                        $recurso->password = $usuario['password'];
                        $recurso->nombre = $usuario['nombre'];
                        $recurso->apellidomaterno = $usuario['apellidomaterno'];
                        $recurso->apellidopaterno = $usuario['apellidopaterno'];
                        $recurso->telefonopersonal = $usuario['telefonopersonal'];
                        $recurso->fechanacimiento = $usuario['fechanacimiento'];
                        $recurso->edad = $usuario['edad'];
                        $recurso->genero = $usuario['genero'];
                        $recurso->save();
                    }
                }
          
                DB::commit(); //SI HAY UN ERROR, NO AGREGA NINGUN DATO.
                return (new Formatear)->igor($recurso,201,$todolodemas);
            }
        
            else{
                $todolodemas['error']['mensaje'] = 'No cuenta con los permisos para este recurso';
                $todolodemas['error']['errores'] = ['permisos'=>['No cuenta con los permisos para este recurso']];
                return (new Formatear)->igor(null,403,$todolodemas);
            }
        } catch (\Throwable $th) {
            $todolodemas['error']['mensaje'] = 'Error en el servidor, ocurrió un error inesperado';
            $todolodemas['error']['errores'] = ['errorinesperado'=>[$th]];
            return (new Formatear)->igor(null,500,$todolodemas);
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
