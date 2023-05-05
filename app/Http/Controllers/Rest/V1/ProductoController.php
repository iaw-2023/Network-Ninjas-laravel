<?php

namespace App\Http\Controllers\Rest\V1;

use App\Http\Controllers\Controller;
use App\Models\Producto;
use Illuminate\Http\Request;


/**
* @OA\Info(
*      version="1.0.0",
*      title="Laravel OpenApi Documentation"
* )
*
* @OA\Server(
*      url="http://localhost:8000",
*      description="API Server"
* )
*
* @OA\Tag(
*     name="Projects",
*     description="API Endpoints of Projects"
* )
*/


class ProductoController extends Controller
{


    /**
    * @OA\Get(
    *     path="/api/producto",
    *     summary="Mostrar todos los productos",
    *     description="Se retornan todos los productos",
    *     @OA\Response(
    *         response=200,
    *         description="Mostrar todos los productos."
    *     ),
    *     @OA\Response(
    *         response="default",
    *         description="Ha ocurrido un error."
    *     )
    * )
    */
    public function index()
    {
        return Producto::orderBy('id','asc')->get();
    }

    /**
    * @OA\Get(
    *     path="/api/producto/{producto}",
    *     summary="Buscar un producto mediante un ID",
    *     description="Retorna el producto que tenga la ID ingresada",
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
    *         response="default",
    *         description="Ha ocurrido un error."
    *     )
    * )
    */
    public function show($id)
    {
        return Producto::find($id);
    }

}
