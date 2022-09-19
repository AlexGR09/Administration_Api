<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\InfoFiscal;
use App\Models\User;
use Illuminate\Http\Request;

class InformacionFiscalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user_id = auth()->user()->id;
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
        }
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

        $info_fiscal->save();

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

        return response()->json([
            "status" => 1,
            "msg" => "Informacion fiscal dada de alta"
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
