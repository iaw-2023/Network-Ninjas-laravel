<?php

namespace App\Http\Controllers\Rest\V1;

use App\Http\Controllers\Controller;
use App\Models\Pedido;
use App\Models\DetallesPedido;
use Illuminate\Http\Request;

class PedidoController extends Controller
{

    /**
     * @OA\Post(
     *      path="/rest/v1/pedidos",
     *      tags={"pedidos"},
     *      @OA\RequestBody(
     *          @OA\JsonContent(ref="#/components/schemas/Pedido"),
     *          required=true,
     *          description="El pedido que se va a crear"
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

        return Pedido::create($request->all());
    }

}
