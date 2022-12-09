<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\FormatterController as Formatear;
use Illuminate\Support\Facades\DB;
use App\Models\Ubicacion;
use App\Models\User;
use Illuminate\Http\Request;
class UbicacionController extends Controller
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
                $recurso = Ubicacion::with('cliente','infofiscalubicacion','municipio','infofiscalubicacion','caracteristicasubicacion')
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
        $request->validate([
            "tipo" => "required",
            "nombreubicaciones" => "required",
            "cofeprisfunc" => "required",
            "cofeprispubli" => "required",
            "email" => "required",
            "telefonocitas" => "required",
            "tipotelefono" => "required",
            "telefonoemergencias" => "required",
            "imagenubicacion" => "required",
            "tipovialidad" => "required",
            "nombrevialidad" => "required",
            "numeroexterior" => "required",
            "numerointerior" => "required",
            "tipocolonia" => "required",
            "nombrecolonia" => "required",
        ]);

        $user_id = auth()->user()->id;
        $ubicacion = new Ubicacion();
        $ubicacion->cliente_id = $request->user_id;
        $ubicacion->tipo = $request->tipo;
        $ubicacion->nombreubicaciones = $request->nombreubicaciones;
        $ubicacion->cofeprisfunc = $request->cofeprisfunc;
        $ubicacion->cofeprispubli = $request->cofeprispubli;
        $ubicacion->email = $request->email;
        $ubicacion->telefonocitas = $request->telefonocitas;
        $ubicacion->tipotelefono= $request->tipotelefono;
        $ubicacion->telefonoemergencias = $request->telefonoemergencias;
        $ubicacion->imagenubicacion = $request->imagenubicacion;
        $ubicacion->tipovialidad = $request->tipovialidad;
        $ubicacion->nombrevialidad = $request->nombrevialidad;
        $ubicacion->numeroexterior = $request->numeroexterior;
        $ubicacion->numerointerior = $request->numerointerior;
        $ubicacion->tipocolonia = $request->tipocolonia;
        $ubicacion->nombrecolonia = $request->nombrecolonia;
        $ubicacion->cp = $request->cp;

        $ubicacion->save();
        /*
        {
            "tipo" : "laboratorio",
            "nombreubicaciones": "laboratorios de chiapas",
            "cofeprisfunc" : "aqui va el aviso cofepris de funcionamiento",
            "cofeprispubli" : "aqui va cofepris de publicidad",
            "email" : "ubicacion@gmail.com",
            "telefonocitas" : "961548787",
            "tipotelefono" : "consultorio",
            "telefonoemergencias" : "9887415",
            "imagenubicacion" : "aqui va la imagen",
            "tipovialidad" : "avenida",
            "nombrevialidad" : "obregon",
            "numeroexterior" : "numero 56",
            "numerointerior" : "no tiene",
            "tipocolonia" : "colonia",
            "nombrecolonia" : "social",
            "cp" : "29007"
        }
        */
        return response([
            "status" => 1,
            "msg" =>"ubicacion registrada"
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $user_id =auth()->user()->id;
        $ubicacion = Ubicacion::where("id", $user_id)->get();
        return response()->json([
            "status" => 1,
            "msg" => "Ubicacion",
            "data" => $ubicacion
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user_id = auth()->user()->id;
        if(Ubicacion::where(["id" => $user_id])->exists()){
            $actualizar_ubicacion = $request->id;
            $ubicacion = Ubicacion::find($actualizar_ubicacion);
            $ubicacion->tipo = $request->tipo;
            $ubicacion->nombreubicaciones = $request->nombreubicaciones;
            $ubicacion->cofeprisfunc = $request->cofeprisfunc;
            $ubicacion->cofeprispubli = $request->cofeprispubli;
            $ubicacion->email = $request->email;
            $ubicacion->telefonocitas = $request->telefonocitas;
            $ubicacion->tipotelefono = $request->tipotelefono;
            $ubicacion->telefonoemergencias = $request->telefonoemergencias;
            $ubicacion->imagenubicacion = $request->imagenubicacion;
            $ubicacion->tipovialidad = $request->tipovialidad;
            $ubicacion->nombrevialidad = $request->nombrevialidad;
            $ubicacion->numeroexterior = $request->numeroexterior;
            $ubicacion->numerointerior = $request->numerointerior;
            $ubicacion->tipocolonia = $request->tipocolonia;
            $ubicacion->nombrecolonia = $request->nombrecolonia;
            $ubicacion->cp = $request->cp;

            $ubicacion->save();
            return response()->json([
                "status" =>1,
                "msg" => "ubicacion actualizada"
            ]);
        }else{
            return response()->json([
                "status" =>0,
                "msg" => "no se actualizo la ubicacion"
            ],404);
        }
        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $user_id = auth()->user()->id;
        if(User::where(["id" => $user_id])->exists()){
            $eliminar_ubicaciones = $request->id;
            $ubicaciones = Ubicacion::find($eliminar_ubicaciones);

            $ubicaciones->delete();
            return response()->json([
                "status" => 1,
                "msg" => "Ubicacion eliminada",
            ]);
        }else{
            return response()->json([
                "status" => 0,
                "msg" => "No está el cliente",
            ]);
        }
    }
}
