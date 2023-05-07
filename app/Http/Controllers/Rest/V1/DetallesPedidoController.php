<?php

namespace App\Http\Controllers\Rest\V1;

use App\Http\Controllers\Controller;
use App\Models\Pedido;
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
            return DetallesPedido::create($request->all());
        }
        else {
            return response()->json(array('status'=>'error','msg'=>'ID de pedido invalido'),400);
        }

    }

}
