<?php

namespace App\Http\Controllers\Rest\V1;

use App\Http\Controllers\Controller;
use App\Models\Pedido;
use App\Models\Cliente;
use App\Models\DetallesPedido;
use Illuminate\Http\Request;

class PedidoController extends Controller
{

    /**
     * @OA\Post(
     *      path="/rest/v1/pedidos",
     *      tags={"pedidos"},
     *      @OA\RequestBody(
     *          required=true,
     *          description="El pedido que se va a crear",
     *          @OA\JsonContent(
     *              required={"id","fecha_pedido","precio","id_cliente"},
     *              @OA\Property(property="id",type="integer", example="1"),
     *              @OA\Property(property="fecha_pedido",type="string", example="2023-05-02"),
     *              @OA\Property(property="precio",type="integer", example="203000"),
     *              @OA\Property(property="id_cliente",type="integer", example="2")
     *          )
     *      ),
     *      @OA\Response(
     *          response=201,
     *          description="Pedido creado correctamente"
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
        request()->validate(Pedido::$rules);

        $cliente  = Cliente::find($request->get('id_cliente'));
            if($cliente){
                return Pedido::create($request->all());
            }
            else{
                return response()->json(array('status'=>'error','msg'=>'ID de cliente invalido'),400);
            }
    }

}
