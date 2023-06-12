<?php

namespace App\Http\Controllers\Rest\V1;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Pedido;

class ClienteController extends Controller
{
    /**
    * @OA\Get(
    *     path="/rest/v1/clientes",
    *     tags={"clientes"},
    *     summary="Mostrar todos los clientes",
    *     description="Se retornan todos los clientes",
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
        $cliente = Cliente::orderBy('id', 'asc')->get();
        $cliente->setHidden(['created_at','updated_at']);
        return response()->json($cliente);
    }

    /**
    * @OA\Get(
    *     path="/rest/v1/clientes/{id}",
    *     tags={"clientes"},
    *     summary="Buscar un cliente mediante un ID",
    *     description="Retorna el cliente con la ID ingresada",
    *     @OA\Parameter(
    *          name="id",
    *          description="ID del cliente",
    *          required=true,
    *          in="path",
    *          @OA\Schema(
    *              type="integer"
    *          )
    *     ),
    *     @OA\Response(
    *         response=200,
    *         description="Se devuelve el cliente buscada"
    *     ),
    *     @OA\Response(
    *         response=400,
    *         description="ID de cliente invalido"
    *     ),
    *     @OA\Response(
    *         response=404,
    *         description="No se encontro el cliente"
    *     )
    * )
    */
    public function show(string $id)
    {
        $cliente = Cliente::find($id);
        if($cliente){
            $cliente->setHidden(['created_at','updated_at']);
            return response()->json($cliente);
        }
        return response()->json(array('status'=>'error','msg'=>'ID de cliente invalido'),400);
    }

    /**
     * @OA\Post(
     *      path="/rest/v1/clientes",
     *      tags={"clientes"},
     *      @OA\RequestBody(
     *          required=true,
     *          description="El cliente que se va a crear",
     *          @OA\JsonContent(
     *              required={"id","nombre","email"},
     *              @OA\Property(property="id",type="integer", example="1"),
     *              @OA\Property(property="nombre",type="string", example="Carlos"),
     *              @OA\Property(property="email",type="string", example="carlos@gmail.com")
     *          )
     *      ),
     *      @OA\Response(
     *          response=201,
     *          description="Cliente creado correctamente"
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Solicitud incorrecta"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="No autenticado"
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Prohibido"
     *      ),
     *      @OA\Response(
     *          response=405,
     *          description="Entrada invalida"
     *      )
     * )
     */
    public function store(Request $request)
    {
        request()->validate(Cliente::$rules);

        return Cliente::create($request->all());
    }

    /**
    * @OA\Get(
    *     path="/rest/v1/clientes/search/{email}",
    *     tags={"clientes"},
    *     summary="Buscar un cliemte mediante un email",
    *     description="Retorna el cliente con el email ingresado",
    *     @OA\Parameter(
    *          name="email",
    *          description="email del cliente",
    *          required=true,
    *          in="path",
    *          @OA\Schema(
    *              type="string"
    *          )
    *     ),
    *     @OA\Response(
    *         response=200,
    *         description="Se devuelve el cliente buscado"
    *     ),
    *     @OA\Response(
    *         response=400,
    *         description="email del cliente invalido"
    *     ),
    *     @OA\Response(
    *         response=404,
    *         description="No se encontro el cliente"
    *     )
    * )
    */
    public function searchByName($email){
        $cliente = Cliente::where('email', 'iLIKE', '%' . $email . '%')->select('id','nombre','email')->get();

        return response()->json($cliente);
    }
}
