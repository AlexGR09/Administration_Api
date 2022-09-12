<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cliente;
use App\Models\Especialidad;
use Illuminate\Http\Request;

class EspecialidadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user_id = auth()->user()->id;
        $especialidad= Especialidad::where("user_id", $user_id)->get();

        return response()->json([
            "status" => 1,
            "msg" => "Especialidad",
            "data" => $especialidad
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->validate([
            "especiaidad" => "required",
        ]);

        $user_id = auth()->user()->id;
        $especialidad = new Especialidad();
        $especialidad->user_id = $user_id;
        $especialidad->especialidad = $request->especialidad;
        $especialidad->save();

        return response([
            "status" => 1,
            "msg" =>"Especialidad creada"
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$user_id = auth()->user()->id;
        if(Especialidad::where(["id"=>$id])->exists()){
            $info = Especialidad::where(["id" => $id])->get();

            return response()->json([
                "status" => 1,
                "msg" => "Existe esa especialidad",
                "msg" => $info,
            ], 404);
        }else{
            return response()->json([
                "Status" => 1,
                "msg" => "No existeee"
            ], 404);
        }
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
        $user_id= auth()->user()->id;
        $cliente= Cliente::where(["user_id" => $id])->first();
        if(Especialidad::where(["id" => $id, "user_id" => $user_id])->exists()){
            $especialidad = Especialidad::find($id);
            $especialidad->isset($request->especialidad) ? $request->especialidad : $especialidad->especialidad;
            $especialidad->save();

            return response()->json([
                "status" => 1,
                "msg" => "Especialidad actualizada",
            ], 404);
        }else{
            return response()->json([
                "Status" => 1,
                "msg" => "No existeee"
            ], 404);
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
        $user_id= auth()->user()->id;
        if(Especialidad::where(["id" => $id, "user_id" => $user_id])->exists()){
            $especialidad = Especialidad::where(["id" => $id, "user_id" => $user_id])->first();
            $especialidad->delete();
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
