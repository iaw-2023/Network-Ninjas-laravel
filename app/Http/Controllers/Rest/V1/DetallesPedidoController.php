<?php

namespace App\Http\Controllers\Rest\V1;

use App\Http\Controllers\Controller;
use App\Models\DetallesPedido;
use Illuminate\Http\Request;

class PedidoController extends Controller
{

    /**
     * Agrega un nuevo detalle a un pedido.
     *
     * @OA\Post(
     *     path="/rest/v1/detalle",
     *     tags={"detalles"},
     *     operationId="storeDetalle",
     *     @OA\Response(
     *         response=201,
     *         description="Creado correctamente"
     *     ),
     *     @OA\Response(
     *         response=405,
     *         description="Input inválido"
     *     ),
     *     @OA\RequestBody(
     *          request="product_in_body",
     *          required=true,
     *          description="Detalle a agregar",
     *          @OA\JsonContent(ref="#/components/schemas/Detalle")
     *     )
     * )
     */
    public function store(Request $request)
    {
        request()->validate(DetallesPedido::$rules);

        return DetallesPedido::create($request->all());
    }


}
