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
    *     summary="Mostrar todos los productos",
    *     description="Se retornan todos los productos",
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
        $productos = Producto::all();
        $productos->setHidden(['created_at','updated_at']);
        return response()->json($productos);
    }

    /**
    * @OA\Get(
    *     path="/rest/v1/productos/{id}",
    *     tags={"productos"},
    *     summary="Buscar un producto mediante un ID",
    *     description="Retorna el producto con la ID ingresada",
    *     @OA\Parameter(
    *          name="id",
    *          description="ID del producto",
    *          required=true,
    *          in="path",
    *          @OA\Schema(
    *              type="integer"
    *          )
    *     ),
    *     @OA\Response(
    *         response=200,
    *         description="Se devuelve el producto buscado"
    *     ),
    *     @OA\Response(
    *         response=400,
    *         description="ID del producto invalido"
    *     ),
    *     @OA\Response(
    *         response=404,
    *         description="No se encontro el producto"
    *     )
    * )
    */
    public function show($id)
    {
        $producto = Producto::find($id);
        $producto->setHidden(['created_at','updated_at']);
        return response()->json($producto);
    }

}
