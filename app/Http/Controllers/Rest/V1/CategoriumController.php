<?php

namespace App\Http\Controllers\Rest\V1;

use App\Http\Controllers\Controller;
use App\Models\Categorium;
use Illuminate\Http\Request;

class CategoriumController extends Controller
{
    /**
    * @OA\Get(
    *     path="/api/categoria",
    *     summary="Mostrar todas las categorias",
    *     description="Se retornan todas las categorias",
    *     @OA\Response(
    *         response=200,
    *         description="Se muestran todas las categorias"
    *     ),
    *     @OA\Response(
    *         response="default",
    *         description="Ha ocurrido un error."
    *     )
    * )
    */
    public function index()
    {
        return Categorium::orderBy('id','asc')->get();
    }

    /**
    * @OA\Get(
    *     path="/api/categoria/{categorium}",
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
    *         response="default",
    *         description="Ha ocurrido un error."
    *     )
    * )
    */
    public function show($id)
    {
        return Categorium::find($id);
    }

}
