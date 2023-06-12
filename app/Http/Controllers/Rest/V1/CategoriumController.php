<?php

namespace App\Http\Controllers\Rest\V1;

use App\Http\Controllers\Controller;
use App\Models\Categorium;
use Illuminate\Http\Request;

class CategoriumController extends Controller
{
    /**
    * @OA\Get(
    *     path="/rest/v1/categorias",
    *     tags={"categorias"},
    *     summary="Mostrar todas las categorias",
    *     description="Se retornan todas las categorias",
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
        $categorias = Categorium::orderBy('id','asc')->get();
        $categorias->setHidden(['created_at','updated_at']);
        return response()->json($categorias);
    }

    /**
    * @OA\Get(
    *     path="/rest/v1/categorias/{id}",
    *     tags={"categorias"},
    *     summary="Buscar una categoria mediante un ID",
    *     description="Retorna la categoria con la ID ingresada",
    *     @OA\Parameter(
    *          name="id",
    *          description="ID de la categoria",
    *          required=true,
    *          in="path",
    *          @OA\Schema(
    *              type="integer"
    *          )
    *     ),
    *     @OA\Response(
    *         response=200,
    *         description="Se devuelve la categoria buscada"
    *     ),
    *     @OA\Response(
    *         response=400,
    *         description="ID de categoria invalido"
    *     ),
    *     @OA\Response(
    *         response=404,
    *         description="No se encontro la categoria"
    *     )
    * )
    */
    public function show($id)
    {
        $categoria= Categorium::find($id);
        if($categoria){
            $categoria->setHidden(['created_at','updated_at']);
            return response()->json($categoria);
        }
        return response()->json(array('status'=>'error','msg'=>'ID de categoria invalido'),400);
    }

}
