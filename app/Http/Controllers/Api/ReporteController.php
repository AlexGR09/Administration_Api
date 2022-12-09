<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\FormatterController as Formatear;
use App\Models\Reporte;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReporteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
                $recurso = Reporte::with('reportepago')
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /* try { */
            /* $user_id = auth()->user()->id; */
            $user = User::find(1);
            
            $todolodemas = [];

            if($user->puede($user,'cliente','c'))
            {
                DB::beginTransaction(); //IMPORTANTE AGREGAR
        
                // Si el request NO trae array
                $request->validate([
                    "fecha" => "required",
                    "montototal" => "required",
                ]);

                $recurso = new  Reporte();
                $recurso->fecha = $request->fecha;
                $recurso->montototal = $request->montototal;
               
                $recurso->save();

                //Si request llega con un array
                /* if($request->user){
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
                } */
          
                DB::commit(); //SI HAY UN ERROR, NO AGREGA NINGUN DATO.
                return (new Formatear)->igor($recurso,201,$todolodemas);
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
        /* 
        {
            "fecha" : "2022-07-16",
            "montototal" : "1500"
        } 
        */
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
