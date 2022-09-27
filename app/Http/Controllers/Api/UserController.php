<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\FormatterController as Formatear;
use App\Models\Municipio;
use App\Models\Permiso;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function register(Request $request){
        /* try { */
            /* $user = Auth::user()->id; */
            $user = User::find(1);
            
            $todolodemas = [];

            if($user->puede($user,'cliente','c'))
            {
                DB::beginTransaction(); //IMPORTANTE AGREGAR
        
                // Si el request NO trae array
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
                $user->apellidomaterno = $request->apellidomaterno;
                $user->apellidopaterno = $request->apellidopaterno;
                $user->telefonopersonal = $request->telefonopersonal;
                $user->fechanacimiento = $request->fechanacimiento;
                $user->edad = $request->edad;
                $user->genero = $request->genero;
                $user->save();

                /* {
                    "username" : "josdav",
                    "email" : "josdav@gmail.com",
                    "password" : "123456",
                    "nombre" : "josue",
                    "apellidopaterno" : "sarmiento",
                    "apellidomaterno" : "montero",
                    "telefonopersonal" : "96112345678",
                    "fechanacimiento" : "2000-10-04",
                    "edad" : "21",
                    "genero" : "masculino"              
                } */

                //Si request llega con un array
                /* if($request->user){
                    foreach($request->usuario as $usuario){
                        $user = new User();
                        $user->user_id = $usuario['user_id'];
                        $user->username = $usuario['username'];
                        $user->email = $usuario['email'];
                        $user->password = $usuario['password'];
                        $user->nombre = $usuario['nombre'];
                        $user->apellidomaterno = $usuario['apellidomaterno'];
                        $user->apellidopaterno = $usuario['apellidopaterno'];
                        $user->telefonopersonal = $usuario['telefonopersonal'];
                        $user->fechanacimiento = $usuario['fechanacimiento'];
                        $user->edad = $usuario['edad'];
                        $user->genero = $usuario['genero'];
                        $user->save();
                    }
                } */
          
                DB::commit(); //SI HAY UN ERROR, NO AGREGA NINGUN DATO.
                return (new Formatear)->igor($user,201,$todolodemas);
            }
        
            else{
                $todolodemas['error']['mensaje'] = 'No cuenta con los permisos para este recurso';
                $todolodemas['error']['errores'] = ['permisos'=>['No cuenta con los permisos para este recurso']];
                return (new Formatear)->igor(null,403,$todolodemas);
            }
        /* } catch (\Throwable $th) {
            $todolodemas['error']['mensaje'] = 'Error en el servidor, ocurrió un error inesperado';
            $todolodemas['error']['errores'] = ['errorinesperado'=>[$th]];
            return (new Formatear)->igor(null,500,$todolodemas);
        } */  
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
                ]);
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

    public function index(Request $request){
        /* try { */
            $user_id = Auth::user()->id;
            /* $user = User::find(1); */
            
            $todolodemas = [];
            $limit = env('PAGINATION_LIMIT', 20);
            $maxPaginationLimit = env('MAX_PAGINATION_LIMIT', 500);
            $order = 'id';
            $direction = 'desc';
        
            if(isset($request->l)) $limit = $request->l > $maxPaginationLimit || $request->l == 0 ? $limit : $request->l;
            if(isset($request->o)) $order = $request->o;
            if(isset($request->d)) $direction = $request->d;
            
            if($user_id->puede($user_id,'cliente','r'))
            {
                $recurso = User::join('clientes','users.id','=','clientes.user_id')
                ->join('municipios','users.municipio_id','=','municipios.id')
                ->select('users.*','municipios.nombre')
                ->paginate($limit);

                if($recurso==null){
                    $todolodemas['info']['mensaje'] = 'No se encontraron registros en la base de datos';
                    $todolodemas['info']['infos'] = ['registros'=>['No se encontraron registros en la base de datos']];
                    return (new Formatear)->igor($recurso,202,$todolodemas);
                }
                return (new Formatear)->igor($recurso,200,$todolodemas);
            }
            else{
                $todolodemas['error']['mensaje'] = 'No cuenta con los permisos para este recurso';
                $todolodemas['error']['errores'] = ['permisos'=>['No cuenta con los permisos para este recurso']];
                return (new Formatear)->igor(null,403,$todolodemas);
            }
        /* } catch (\Throwable $th) {
          $todolodemas['error']['mensaje'] = 'Error en el servidor, ocurrió un error inesperado';
          $todolodemas['error']['errores'] = ['errorinesperado'=>[$th]];
          return (new Formatear)->igor(null,500,$todolodemas);
        } */
    }

    public function show($id, Request $request){
        try {
            $user_id = auth()->user()->id;
            //$user = User::find(1);
        
            $todolodemas = [];
  
            if($user_id->puede($user_id,'cliente','r'))
            {
  
            $recurso = User::with('cliente')->find($id);
            
                if (is_null($recurso)) {
                    $todolodemas['info']['mensaje'] = 'No se encontró el registro buscado en la base de datos';
                    $todolodemas['info']['infos'] = ['registros'=>['No se encontró el registro buscado en la base de datos']];
                    return (new Formatear)->igor($recurso,202,$todolodemas);
                }
  
                return (new Formatear)->igor($recurso,200,$todolodemas);
            }
            else
            {
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
