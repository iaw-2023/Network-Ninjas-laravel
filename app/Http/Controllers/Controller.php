<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 * @OA\Info(
 *      version="1.0.0",
 *      title="CarFects Api",
 *      description="CarFects Api description",
 *      @OA\Contact(
 *          email="darius@matulionis.lt"
 *      ),
 *     @OA\License(
 *         name="Apache 2.0",
 *         url="https://www.apache.org/licenses/LICENSE-2.0.html"
 *     )
 * )
 * @OA\Schema(
 *      schema="Categoria",
 *      title="Categoria",
 *          @OA\Property(
 *              property="id",
 *              type="integer",
 *              format="int64"
 *          ),
 *          @OA\Property(
 *              property="nombre",
 *              type="string"
 *          )
 *      ),
 *  ),
 *  @OA\Schema(
 *      schema="Producto",
 *      title="Producto",
 *          @OA\Property(
 *              property="id",
 *              type="integer",
 *              format="int64"
 *          ),
 *          @OA\Property(
 *              property="nombre",
 *              type="string"
 *          ),
 *          @OA\Property(
 *              property="precio",
 *              type="integer",
 *              format="int64"
 *          ),
 *          @OA\Property(
 *              property="img",
 *              type="string"
 *          ),
 *          @OA\Property(
 *              property="id_categoria",
 *              type="integer",
 *              format="int64"
 *          )
 *      ),
 *  ),
 * @OA\Schema(
 *      schema="Pedido",
 *      title="Pedido",
 *          @OA\Property(
 *              property="id",
 *              type="integer",
 *              format="int64"
 *          ),
 *          @OA\Property(
 *              property="fecha_pedido",
 *              type="string",
 *              format="date"
 *          ),
 *          @OA\Property(
 *              property="precio",
 *              type="integer",
 *              format="int64"
 *          ),
 *          @OA\Property(
 *              property="id_cliente",
 *              type="integer",
 *              format="int64"
 *          )
 *      ),
 * ),
 * @OA\Schema(
 *      schema="DetallesPedido",
 *      title="DetallesPedido",
 *          @OA\Property(
 *              property="id",
 *              type="integer",
 *              format="int64"
 *          ),
 *          @OA\Property(
 *              property="precio_total",
 *              type="integer",
 *              format="int64"
 *          ),
 *          @OA\Property(
 *              property="cantidad",
 *              type="integer",
 *              format="int64"
 *          ),
 *          @OA\Property(
 *              property="id_pedido",
 *              type="integer",
 *              format="int64"
 *          ),
 *          @OA\Property(
 *              property="id_producto",
 *              type="integer",
 *              format="int64"
 *          )
 *      ),
 *  )
 */

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    protected static $PAGINATION = 8;
}
