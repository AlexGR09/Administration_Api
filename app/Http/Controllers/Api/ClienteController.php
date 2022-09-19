<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cliente;
use App\Models\User;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user_id = auth()->user()->id;
        if(User::where(["id" => $user_id])->exists()){
            $index_cliente = $request->id;
            $cliente= Cliente::where($index_cliente)->get();
            return response()->json([
                "status" => 1,
                "msg" => "Cliente",
                "data" => $cliente
            ]);
        }else{
            return response()->json([
                "status" => 0,
                "msg" => "Cliente",
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
            "titulo" => "required",
            "foto" => "required",
            "curp" => "required",
            "tipotelefono" => "required",
            "telefonocliente" => "required",
        ]);

        $user_id = auth()->user()->id;
        $cliente = new Cliente();
        $cliente->user_id = $request->user_id;
        $cliente->titulo = $request->titulo;
        $cliente->foto = $request->file('foto')->store('public');
        $cliente->curp = $request->curp;
        $cliente->tipotelefono = $request->tipotelefono;
        $cliente->telefonocliente = $request->telefonocliente;

        $cliente->save();

        /*
        {
            "titulo" : "aqui va el documento del titulo",
            "foto" : "inserte la foto",
            "curp" : "inserte curp",
            "tipotelefono" : "casa/movil/oficina",
            "telefonocliente" : "numero de telefono"              
        }
        */



        return response([
            "status" => 1,
            "msg" =>"Cliente registrado"
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
        $user_id = auth()->user()->id;
        $cliente= Cliente::where("id", $user_id)->get();

        return response()->json([
            "status" => 1,
            "msg" => "Cliente",
            "data" => $cliente
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
        if(Cliente::where(["id" => $user_id])->exists()){
            $actualizar_cliente = $request->id;
            $cliente = Cliente::find($actualizar_cliente);
            $cliente->user_id = $user_id;
            $cliente->titulo = $request->titulo;
            $cliente->foto = $request->foto;
            $cliente->curp = $request->curp;
            $cliente->tipotelefono = $request->tipotelefono;
            $cliente->telefonocliente = $request->telefonocliente;
            
            $cliente->save();

            return response()->json([
                "status" =>1,
                "msg" => "cliente actualizado"
            ]);
        }else{
            return response()->json([
                "status" =>0,
                "msg" => "no se actualizo el cliente"
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
            $eliminar_cliente = $request->id;
            $cliente = Cliente::find($eliminar_cliente);

            $cliente->delete();
            return response()->json([
                "status" => 1,
                "msg" => "Cliente eliminado",
            ]);
        }else{
            return response()->json([
                "status" => 0,
                "msg" => "No está el cliente",
            ]);
        }
    }
}
