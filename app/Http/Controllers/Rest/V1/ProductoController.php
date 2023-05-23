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
        $productos = Producto::orderBy('id','asc')->get();
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
        if($producto){
            $producto->setHidden(['created_at','updated_at']);
            return response()->json($producto);
        }
        return response()->json(array('status'=>'error','msg'=>'ID de producto invalido'),400);

    }

    /**
    * @OA\Get(
    *     path="/rest/v1/productos/search/{nombre}",
    *     tags={"productos"},
    *     summary="Buscar un producto mediante un nombre",
    *     description="Retorna el producto con el nombre ingresado",
    *     @OA\Parameter(
    *          name="nombre",
    *          description="nombre del producto",
    *          required=true,
    *          in="path",
    *          @OA\Schema(
    *              type="string"
    *          )
    *     ),
    *     @OA\Response(
    *         response=200,
    *         description="Se devuelve el producto buscado"
    *     ),
    *     @OA\Response(
    *         response=400,
    *         description="nombre del producto invalido"
    *     ),
    *     @OA\Response(
    *         response=404,
    *         description="No se encontro el producto"
    *     )
    * )
    */
    public function searchByName($nombre){
        $productos = Producto::where('nombre', 'iLIKE', '%' . $nombre . '%')->select('id','nombre','precio','img','id_categoria')->get();

        return response()->json($productos);
    }

    /**
    * @OA\Get(
    *     path="/rest/v1/productos/search/categoria/{id_categoria}",
    *     tags={"productos"},
    *     summary="Busca productos por su categoria",
    *     description="Retorna el o los productos pertenecientes a la categoria ingresada",
    *     @OA\Parameter(
    *          name="id_categoria",
    *          description="id de la categoria de la que se buscaran productos",
    *          required=true,
    *          in="path",
    *          @OA\Schema(
    *              type="integer"
    *          )
    *     ),
    *     @OA\Response(
    *         response=200,
    *         description="Se devuelven los productos de la categoria"
    *     ),
    *     @OA\Response(
    *         response=400,
    *         description="categoria de productos invalida"
    *     ),
    *     @OA\Response(
    *         response=404,
    *         description="No se encontraron productos con esa categoria"
    *     )
    * )
    */
    public function searchByCategory($category){
        $productos = Producto::whereHas('categoria', function($query) use ($category){
            $query->where('id',$category);
        })->select('id','nombre','precio','img')->get();

        return response()->json($productos);
    }

}
