<?php

namespace App\Http\Controllers\Rest\V1;

use App\Http\Controllers\Controller;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{

     /**
     * @OA\Get(
     *     path="/rest/v1/productos",
     *     tags={"productos"},
     *     summary="Obtiene una cantidad de productos desde un indice",
     *     description="Retorna un arreglo de productos",
     *     operationId="indexProductos",
     *     @OA\Parameter(
     *         name="indice",
     *         in="path",
     *         description="Indice del primer producto, valor por defecto es 0",
     *         @OA\Schema(
     *             type="integer",
     *             format="int64"
     *         )
     *     ),
     *     @OA\Parameter(
     *         name="cantidad",
     *         in="path",
     *         description="Cantidad de producto a devolver, valor por defecto es 10",
     *         @OA\Schema(
     *             type="integer",
     *             format="int64"
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="successful operation",
     *         @OA\JsonContent(
     *              type="array",
     *              @OA\Items(ref="#/components/schemas/Producto")
     *         )
     *     )
     * )
     */
    public function index()
    {
        return Producto::orderBy('id','asc')->get();
    }

    /**
     * @OA\Get(
     *     path="/rest/v1/productos/{productoId}",
     *     tags={"productos"},
     *     summary="Busca un producto por ID",
     *     description="Retorna un solo producto",
     *     operationId="showProducto",
     *     @OA\Parameter(
     *         name="productoId",
     *         in="path",
     *         description="ID del producto a retornar",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *             format="int64"
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Operación completada correctamente",
     *         @OA\JsonContent(ref="#/components/schemas/Producto")
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="ID inválido"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Producto no encontrado"
     *     )
     * )
     *
     * @param int $id
     */
    public function show($id)
    {
        return Producto::find($id);
    }

}
