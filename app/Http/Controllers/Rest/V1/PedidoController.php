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

    /**
    * @OA\Get(
    *     path="/rest/v1/pedidos/search/{id}",
    *     tags={"pedidos"},
    *     summary="Buscar los pedidos de un cliente por su id",
    *     description="Retorna los pedidos del cliente",
    *     @OA\Parameter(
    *          name="id",
    *          description="id del cliente",
    *          required=true,
    *          in="path",
    *          @OA\Schema(
    *              type="integer"
    *          )
    *     ),
    *     @OA\Response(
    *         response=200,
    *         description="Se devuelven los pedidos del cliente"
    *     ),
    *     @OA\Response(
    *         response=400,
    *         description="id de cliente invalido"
    *     ),
    *     @OA\Response(
    *         response=404,
    *         description="No se encontro el o los pedidos"
    *     )
    * )
    */
    public function searchByClientId($id){
        $pedidos = Pedido::where('id_cliente', 'iLIKE', '%' . $id . '%')->select('id','fecha_pedido','precio')->get();

        return response()->json($pedidos);
    }

    public function payWithMercadoPago(Request $request){

        \MercadoPago\SDK::setAccessToken("TEST-6784191206263032-062617-fc88b20db6035abd95b1cd2b2f076e79-709192249");

        $payment = new \MercadoPago\Payment();

        $contents = $request;
        $payment->transaction_amount = $contents['transaction_amount'];
        $payment->token = $contents['token'];
        $payment->installments = $contents['installments'];
        $payment->payment_method_id = $contents['payment_method_id'];
        $payment->issuer_id = $contents['issuer_id'];

        $payer = new \MercadoPago\Payer();
        $payer->email = $contents['payer']['email'];
        $payer->identification = array(
            "type" => $contents['payer']['identification']['type'],
            "number" => $contents['payer']['identification']['number']
        );

        $payment->payer = $payer;

        $payment->save();

        $response = array(
            'status' => $payment->status,
            'status_detail' => $payment->status_detail,
            'id' => $payment->id
        );
        return response()->json($response);
    }

}
