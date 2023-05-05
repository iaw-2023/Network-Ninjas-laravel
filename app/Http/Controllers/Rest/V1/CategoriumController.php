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
     *     description="Se retorna un arreglo de categorias",
     *     operationId="indexCategorias",
     *     @OA\Parameter(
     *         name="indice",
     *         in="path",
     *         description="Indice de la primera categoria, valor por defecto es 0",
     *         @OA\Schema(
     *             type="integer",
     *             format="int64"
     *         )
     *     ),
     *     @OA\Parameter(
     *         name="cantidad",
     *         in="path",
     *         description="Cantidad de categorias a devolver, valor por defecto es 10",
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
     *              @OA\Items(ref="#/components/schemas/Categoria")
     *         )
     *     )
     * )
     */
    public function index()
    {
        return Categorium::orderBy('id','asc')->get();
    }

    /**
     * @OA\Get(
     *     path="/rest/v1/categorias/{categoriaId}",
     *     tags={"categorias"},
     *     summary="Busca una categoria por ID",
     *     description="Retorna una sola categoria",
     *     operationId="showCategoria",
     *     @OA\Parameter(
     *         name="categoriaId",
     *         in="path",
     *         description="ID de la categoria a retornar",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *             format="int64"
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Operación completada correctamente",
     *         @OA\JsonContent(ref="#/components/schemas/Categoria")
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="ID inválido"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Categoria no encontrada"
     *     )
     * )
     *
     * @param int $id
     */
    public function show($id)
    {
        return Categorium::find($id);
    }

}
