<?php

namespace App\Http\Controllers\Rest\V1;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Pedido;

/**
 * Class ClienteController
 * @package App\Http\Controllers
 */
class ClienteController extends Controller
{
    /**
    * @OA\Get(
    *     path="/rest/v1/clientes",
    *     tags={"clientes"},
    *     summary="Mostrar todos los clientes",
    *     description="Se retornan todos los clientes",
    *     @OA\Response(
    *         response=200,
    *         description="Operacion completada con exito."
    *     ),
    *     @OA\Response(
    *         response="default",
    *         description="Ha ocurrido un error."
    *     )
    * )
    */
    public function index()
    {
        $cliente = Cliente::orderBy('id', 'asc')->get();
        $cliente->setHidden(['created_at','updated_at']);
        return response()->json($cliente);
    }

    /**
    * @OA\Get(
    *     path="/rest/v1/clientes/{id}",
    *     tags={"clientes"},
    *     summary="Buscar un cliente mediante un ID",
    *     description="Retorna el cliente con la ID ingresada",
    *     @OA\Parameter(
    *          name="id",
    *          description="ID del cliente",
    *          required=true,
    *          in="path",
    *          @OA\Schema(
    *              type="integer"
    *          )
    *     ),
    *     @OA\Response(
    *         response=200,
    *         description="Se devuelve el cliente buscada"
    *     ),
    *     @OA\Response(
    *         response=400,
    *         description="ID de cliente invalido"
    *     ),
    *     @OA\Response(
    *         response=404,
    *         description="No se encontro el cliente"
    *     )
    * )
    */
    public function show(string $id)
    {
        $cliente = Cliente::find($id);
        if($cliente){
            $cliente->setHidden(['created_at','updated_at']);
            return response()->json($cliente);
        }
        return response()->json(array('status'=>'error','msg'=>'ID de cliente invalido'),400);
    }
}
