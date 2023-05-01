<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pedido;
use App\Models\DetallesPedido;
use Illuminate\Http\Request;

class PedidoController extends Controller
{

    /**
    * @OA\Get(
    *     path="/api/pedido",
    *     summary="Mostrar todos los pedidos",
    *     description="Se retornan todos los pedidos",
    *     @OA\Response(
    *         response=200,
    *         description="Se devuelven todos los pedidos"
    *     ),
    *     @OA\Response(
    *         response="default",
    *         description="Ha ocurrido un error."
    *     )
    * )
    */
    public function index()
    {
        return Pedido::orderBy('id', 'asc')->simplePaginate(Controller::$RESULT_PAGINATION);
    }

    /**
    * @OA\Get(
    *     path="/api/pedido/create",
    *     summary="Crear un nuevo pedido",
    *     description="Retorna un nuevo pedido vacio",
    *     @OA\Response(
    *         response=200,
    *         description="Se devuelve el nuevo pedido"
    *     ),
    *     @OA\Response(
    *         response="default",
    *         description="Ha ocurrido un error."
    *     )
    * )
    */
    public function create()
    {
        return new Pedido();
    }


        /**
     * @OA\Post(
     *      path="/api/pedido",
     *      summary="Guardar un pedido",
     *      description="Se almacena un nuevo pedido",
     *      @OA\RequestBody(
     *          required=true,
     *      ),
     *      @OA\Response(
     *          response=201,
     *          description="Successful operation",
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     * )
     */
    public function store(Request $request)
    {
        request()->validate(Pedido::$rules);

        return Pedido::create($request->all());
    }

    /**
     * @OA\Get(
     *      path="/api/pedido/{pedido}",
     *      summary="Obtener los detalles de un pedido",
     *      description="Retorna los detalles de un pedido",
     *      @OA\Parameter(
     *          name="pedido",
     *          description="Pedido a usar",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="pedido"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Se retornan todos los detalles asociados al pedido",
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     * )
     */
    public function show(Pedido $pedido)
    {
        $detalles_pedido = DetallesPedido::join('producto', 'detalles_pedido.id_producto', '=', 'producto.id')
        ->select('detalles_pedido.*', 'producto.nombre')
        ->where('detalles_pedido.id_pedido', '=', $pedido->id)
        ->orderBy('id', 'asc');

    return $pedido->with('detalles_pedido', $detalles_pedido);
    }

    /**
     * @OA\Get(
     *      path="/api/pedido/{pedido}/edit",
     *      summary="Se obtiene un pedido mediante una ID",
     *      description="Se obtiene el pedido con la ID ingresada para ser editado",
     *      @OA\Parameter(
     *          name="id",
     *          description="ID del pedido a editar",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Se retorna el pedido buscado para ser editado",
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     * )
     */
    public function edit($id)
    {
        return Pedido::find($id);
    }

    /**
     * @OA\Put(
     *      path="/api/pedido/{pedido}",
     *      summary="Actualizar un pedido",
     *      description="Actualiza un pedido",
     *      @OA\Parameter(
     *          name="pedido",
     *          description="Pedido a actualizar",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="pedido"
     *          )
     *      ),
     *      @OA\RequestBody(
     *          required=true,
     *      ),
     *      @OA\Response(
     *          response=202,
     *          description="Successful operation",
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Resource Not Found"
     *      )
     * )
     */
    public function update(Request $request, Pedido $pedido)
    {
        request()->validate(Pedido::$rules);

        $pedido->update($request->all());
    }

    /**
     * @OA\Delete(
     *      path="/api/pedido/{pedido}",
     *      summary="Elimina un pedido",
     *      description="Elimina un pedido existente con la ID ingresada",
     *      @OA\Parameter(
     *          name="id",
     *          description="ID del pedido a eliminar",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=204,
     *          description="Successful operation",
     *          @OA\JsonContent()
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Resource Not Found"
     *      )
     * )
     */
    public function destroy($id)
    {
        Pedido::find($id)->delete();
    }
}
