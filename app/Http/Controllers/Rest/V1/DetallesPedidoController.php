<?php

namespace App\Http\Controllers\Rest\V1;

use App\Http\Controllers\Controller;
use App\Models\Pedido;
use App\Models\Producto;
use App\Models\DetallesPedido;
use Illuminate\Http\Request;

class DetallesPedidoController extends Controller
{

    /**
     * @OA\Post(
     *      path="/rest/v1/detalles",
     *      tags={"detalles"},
     *      summary="Guardar un detalle de un pedido",
     *      description="Se almacena un nuevo detalle de un pedido",
     *      @OA\RequestBody(
     *          required=true,
     *          description="El detalle que se va a crear",
     *          @OA\JsonContent(
     *              required={"id","precio_total","cantidad","id_pedido","id_producto"},
     *              @OA\Property(property="id",type="integer", example="1"),
     *              @OA\Property(property="precio_total",type="integer", example="200000"),
     *              @OA\Property(property="cantidad",type="integer", example="3"),
     *              @OA\Property(property="id_pedido",type="integer", example="2"),
     *              @OA\Property(property="id_producto",type="integer", example="1")
     *          )
     *      ),
     *      @OA\Response(
     *          response=201,
     *          description="Detalle creado correctamente"
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Solicitud incorrecta"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="No autenticado"
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Prohibido"
     *      ),
     *      @OA\Response(
     *          response=405,
     *          description="Entrada invalida"
     *      )
     * )
     */
    public function store(Request $request)
    {
        request()->validate(DetallesPedido::$rules);

        $pedido  = Pedido::find($request->get('id_pedido'));
        if($pedido){
            $producto  = Producto::find($request->get('id_producto'));
            if($producto){
                return DetallesPedido::create($request->all());
            }
            else{
                return response()->json(array('status'=>'error','msg'=>'ID de producto invalido'),400);
            }
        }
        else {
            return response()->json(array('status'=>'error','msg'=>'ID de pedido invalido'),400);
        }

    }

    /**
    * @OA\Get(
    *     path="/rest/v1/detalles/search/{id}",
    *     tags={"detalles"},
    *     summary="Buscar los  detalles de un pedido por su id",
    *     description="Retorna los detalles del pedido",
    *     @OA\Parameter(
    *          name="id",
    *          description="id del pedido",
    *          required=true,
    *          in="path",
    *          @OA\Schema(
    *              type="integer"
    *          )
    *     ),
    *     @OA\Response(
    *         response=200,
    *         description="Se devuelven los detalles del pedido"
    *     ),
    *     @OA\Response(
    *         response=400,
    *         description="id de pedido invalido"
    *     ),
    *     @OA\Response(
    *         response=404,
    *         description="No se encontro el o los detalles"
    *     )
    * )
    */
    public function searchByOrderId($id){
        $detalles = DetallesPedido::where('id_pedido', 'iLIKE', '%' . $id . '%')->select('id','precio_total','cantidad','id_producto')->get();

        return response()->json($detalles);
    }

}
