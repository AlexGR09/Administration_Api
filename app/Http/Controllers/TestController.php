<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\User;
use App\Models\Permiso;
use App\Models\Estado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\FormatterController as Formatear;
use App\Models\CaracteristicasUbicacion;
use App\Models\Empleado;
use App\Models\Especialidad;
use App\Models\InfoFiscal;
use App\Models\InfoPublicitaria;
use App\Models\Municipio;
use App\Models\Ubicacion;

class TestController extends Controller
{
    public function index(Request $request)
    {
        /* try { */
            /* $user_id = auth()->user()->id; */
            $user = User::find(1);
            
            $todolodemas = [];
            $limit = env('PAGINATION_LIMIT', 20);
            $maxPaginationLimit = env('MAX_PAGINATION_LIMIT', 500);
            $order = 'id';
            $direction = 'desc';
        
            if(isset($request->l)) $limit = $request->l > $maxPaginationLimit || $request->l == 0 ? $limit : $request->l;
            if(isset($request->o)) $order = $request->o;
            if(isset($request->d)) $direction = $request->d;
            
            if($user->puede($user,'cliente','r'))
            {
                $recurso = Empleado::with('user')
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

    public function store(Request $request)
    {    
        try {
            /* $user_id = auth()->user()->id; */
            $user = User::find(1);
            
            $todolodemas = [];

            if($user->puede($user,'Doctores','c'))
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

    public function show($id, Request $request)
    {
        try {
            // $user_id = auth()->user()->id;
            $user = User::find(1);
        
            $todolodemas = [];
  
            if($user->puede($user,'cliente','r'))
            {
  
                $recurso = User::with('municipio')
                ->join('clientes','users.id','=','clientes.user_id')
                ->join('especialidades','clientes.especialidad_id','=','especialidades.id')
                ->find($id);
            
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

    public function update($id, Request $request)
    {
        try {
            /* $user_id = auth()->user()->id; */
            $user = User::find(1);
          
            $todolodemas = [];
            
            if($user->puede($user,'Fotografia','u'))
            {  
                DB::beginTransaction(); //IMPORTANTE AGREGAR
  
                $input = $request->all();
                $recurso = Fotografia::find($id);
        
                if(is_null($recurso)){
                    $todolodemas['info']['mensaje'] = 'No se encontró el registro para actualizar en la base de datos';
                    $todolodemas['info']['infos'] = ['registros'=>['No se encontró el registro para actualizar en la base de datos']];
                    return (new Formatear)->igor($recurso,202,$todolodemas);
                }
  
                $recurso = $recurso::where('id', $id)->update($input);
                $recurso = Fotografia::find($id);

                DB::commit(); //SI HAY UN ERROR, NO AGREGA NINGUN DATO.
  
                return (new Formatear)->igor($recurso,201,$todolodemas); 

                //-------------------------- SI SE MANDA CON ARRAYS -------------------------------
                if(isset($request->cargoproveedor)) $recurso->cargoproveedor = $request->cargoproveedor;
                if(isset($request->abonoproveedor)) $recurso->abonoproveedor = $request->abonoproveedor;
                if(isset($request->saldoproveedor)) $recurso->saldoproveedor = $request->saldoproveedor;
                $recurso->actualizadopor_id = $user_id;
                $recurso->save();

                if($request->contactos){
                    foreach($request->contactos as $contacto){
                  
                        if($contacto['id'] == 0){
                            $recursoC = Contacto::where('id',$contacto['id'])->first();
                            $recursoC->actualizadopor_id = $user_id;
                        }else{
                            $recursoC = new Contacto;
                        }
                        $recursoC->cuenta_id = $id;
                        $recursoC->email = $contacto['email'];
                        $recursoC->user_id = $user_id;
                        $recursoC->municipio_id = $contacto['municipio_id'];
                        $recursoC->entidad_id = $contacto['entidad_id'];
                        $recursoC->codigopostal = $contacto['codigopostal'];
                        if($contacto['id'] == 0) $recursoC->creadopor_id = $user_id;
                        else $recursoC->actualizadopor_id = $user_id;
                            
                        $recursoC->save();
                    }
                }
                //----------------------------------------------------------------------------
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

    public function destroy($id, Request $request)
    {
        try {
            /* $user_id = auth()->user()->id; */
            $user = User::find(1);
            
            $todolodemas = [];
    
            if($user->puede($user,'Fotografia','d'))
            { 
                if(isset($request->ids))
                {
                    $recurso = Fotografia::whereIn('id',$request->ids)->delete();
                    $todolodemas['info']['mensaje'] = 'Registros eliminado correctamente';
                    $todolodemas['info']['infos'] = ['registros'=>['Registros eliminado correctamente']];
                    
                    return (new Formatear)->igor(null,200,$todolodemas);
                }
                else
                {          
                    $recurso = Fotografia::find($id);
                    if (is_null($recurso)) {
                        $todolodemas['info']['mensaje'] = 'No se encontró el registro que se intenta borrar, es probable que haya sido borrado anteriormente';
                        $todolodemas['info']['infos'] = ['registros'=>['No se encontró el registro buscado en la base de datos']];
                        return (new Formatear)->igor($recurso,202,$todolodemas);
                    }
                    else{
                        $recurso->delete();
                        
                        $todolodemas['info']['mensaje'] = 'Registro eliminado correctamente';
                        $todolodemas['info']['infos'] = ['registros'=>['Registro eliminado correctamente']];
                        return (new Formatear)->igor($recurso,200,$todolodemas);
                    }
                }
            }
            else{
                $todolodemas['error']['mensaje'] = 'No cuenta con los permisos para este recurso';
                $todolodemas['error']['errores'] = ['permisos'=>['No cuenta con los permisos para este recurso']];
                return (new Formatear)->igor(null,403,$todolodemas);
            }
        } catch (Exception $ex) {
            $todolodemas['error']['mensaje'] = 'Error en el servidor, ocurrió un error inesperado';
            $todolodemas['error']['errores'] = ['errorinesperado'=>[$th]];
            return (new Formatear)->igor(null,500,$todolodemas);
        }
    }
}