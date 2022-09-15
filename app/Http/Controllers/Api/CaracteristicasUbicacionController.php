<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CaracteristicasUbicacion;
use App\Models\User;
use Illuminate\Http\Request;

class CaracteristicasUbicacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            "turno" => "required",
            "promediopacientes" => "required",
            "capacidadmaxima" => "required",
            "nivelcompetencia" => "required",
            "precioconsultacompetencia" => "required",
        ]);

        $user_id = auth()->user()->id;
        $caracteristica_ubicacion = new CaracteristicasUbicacion();
        $caracteristica_ubicacion->ubicacion_id = $request->user_id;
        $caracteristica_ubicacion->turno = $request->turno;
        $caracteristica_ubicacion->promediopacientes = $request->promediopacientes;
        $caracteristica_ubicacion->capacidadmaxima = $request->capacidadmaxima;
        $caracteristica_ubicacion->nivelcompetencia = $request->nivelcompetencia;
        $caracteristica_ubicacion->precioconsultacompetencia = $request->precioconsultacompetencia;

        $caracteristica_ubicacion->save();

        /* 
        {
            "turno" : "matutino",
            "promediopacietes" : "75",
            "capacidadmaxima" : "100;
            "nivelcompetencia" : "alto"
            "precioconsultacompetencia" : "500"
        }
        */
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $user_id = auth()->user()->id;
        $caracteristica_ubicacion = CaracteristicasUbicacion::where("id",$user_id)->get();
        return response()->json([
            "status" => 1,
            "msg" => "Caracteristicas",
            "data" => $caracteristica_ubicacion
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
        if(CaracteristicasUbicacion::where(["id" => $user_id])->exists()){
            $actualizar_caracteristicas = $request->id;
            $caracteristica_ubicacion = CaracteristicasUbicacion::find($actualizar_caracteristicas);
            $caracteristica_ubicacion->turno = $request->turno;
            $caracteristica_ubicacion->promediopacientes= $request->promediopacientes;
            $caracteristica_ubicacion->capacidadmaxima = $request->capacidadmaxima;
            $caracteristica_ubicacion->nivelcompetencia = $request->nivelcompetencia;
            $caracteristica_ubicacion->precioconsultacompetencia = $request->precioconsultacompetencia;

            $caracteristica_ubicacion->update();

            return response()->json([
                "status" => 1,
                "msg" =>"caracteristica actualizada"
            ]);
        }else{
            return response()->json([
                "status" => 0,
                "msg" => "actualizadan't"
            ]);
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
            $eliminar_caracteristicas = $request->id;
            $caracteristica_ubicacion = CaracteristicasUbicacion::find($eliminar_caracteristicas);

            $caracteristica_ubicacion->delete();
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
