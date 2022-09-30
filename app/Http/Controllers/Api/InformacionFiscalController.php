<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\FormatterController as Formatear;
use App\Models\InfoFiscal;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InformacionFiscalController extends Controller
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
                $recurso = InfoFiscal::with('cliente','municipio','pago')
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

        /* $user_id = auth()->user()->id;
        if(User::where(["id => $user_id"])->exists()){
            $index_info_fiscal = $request->id;
            $info_fiscal = InfoFiscal::where($index_info_fiscal)->get();

            return response()->json([
                "status" => 1,
                "msg" => "Informacion fiscal",
                "data"=> $info_fiscal
            ]);
        }else{
            return response()->json([
                "status" => 0,
                "msg" => "No hay nada"
            ]);
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
            /* $user = User::find(1); */
            $user = Auth::user();
            $todolodemas = [];

            if($user->puede($user,'cliente','c'))
            {
                DB::beginTransaction(); //IMPORTANTE AGREGAR
        
                // Si el request NO trae array
                $request->validate([
                    "razonsocial" => "required",
                    "rfc" => "required",
                    "tipovialidad" => "required",
                    "nombrevialidad" => "required",
                    "numeroexterior" => "required",
                    "numerointerior" => "required",
                    "tipocolonia" => "required",
                    "nombrecolonia" => "required",
                    "cp" => "required",
                ]);

                
                $info_fiscal = new  InfoFiscal();
                $info_fiscal->cliente_id = $request->user_id;
                $info_fiscal->razonsocial = $request->razonsocial;
                $info_fiscal->rfc = $request->rfc;
                $info_fiscal->tipovialidad = $request->tipovialidad;
                $info_fiscal->nombrevialidad = $request->nombrevialidad;
                $info_fiscal->numeroexterior = $request->numeroexterior;
                $info_fiscal->numerointerior = $request->numerointerior;
                $info_fiscal->tipocolonia = $request->tipocolonia;
                $info_fiscal->nombrecolonia = $request->nombrecolonia;
                $info_fiscal->cp = $request->cp;

                $info_fiscal->save();

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
                return (new Formatear)->igor($info_fiscal,201,$todolodemas);
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

        /* $request->validate([
            "razonsocial" => "required",
            "rfc" => "required",
            "tipovialidad" => "required",
            "nombrevialidad" => "required",
            "numeroexterior" => "required",
            "numerointerior" => "required",
            "tipocolonia" => "required",
            "nombrecolonia" => "required",
            "cp" => "required",
        ]);

        $user_id = auth()->user()->id;
        $info_fiscal = new  InfoFiscal();
        $info_fiscal->cliente_id = $request->user_id;
        $info_fiscal->razonsocial = $request->razonsocial;
        $info_fiscal->rfc = $request->rfc;
        $info_fiscal->tipovialidad = $request->tipovialidad;
        $info_fiscal->nombrevialidad = $request->nombrevialidad;
        $info_fiscal->numeroexterior = $request->numeroexterior;
        $info_fiscal->numerointerior = $request->numerointerior;
        $info_fiscal->tipocolonia = $request->tipocolonia;
        $info_fiscal->nombrecolonia = $request->nombrecolonia;
        $info_fiscal->cp = $request->cp;

        $info_fiscal->save(); */

        /* 
        {
            "razonsocial" : "inserte razon social",
            "rfc" : "1325668",
            "tipovialidad" : "circunvalacion",
            "nombrevialidad" : "san pedro",
            "numeroexterior" : "75",
            "numerointerior" : "1",
            "tipocolonia" : "privada",
            "nombrecolonia" : "alberto",
            "cp" : "29064"
        } 
        */

        /* return response()->json([
            "status" => 1,
            "msg" => "Informacion fiscal dada de alta"
        ]); */
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
    public function update(Request $request)
    {
        $user_id = auth()->user()->id;
        if(InfoFiscal::where(["id" => $user_id])->exists()){
            $actualizar_info_fiscal = $request->id;
            $info_fiscal = InfoFiscal::find($actualizar_info_fiscal);
            $info_fiscal->razonsocial = $request->razonsocial;
            
        }
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
