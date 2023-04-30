<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pedido;
use App\Models\DetallesPedido;
use Illuminate\Http\Request;

/**
 * Class PedidoController
 * @package App\Http\Controllers
 */
class PedidoController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Pedido::orderBy('id', 'asc')->simplePaginate(Controller::$RESULT_PAGINATION);
    }

    /**
     * Creates a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return new Pedido();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Pedido::$rules);

        return Pedido::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  Pedido $pedido
     * @return \Illuminate\Http\Response
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
     * Return the resource to edit
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return Pedido::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Pedido $pedido
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pedido $pedido)
    {
        request()->validate(Pedido::$rules);

        $pedido->update($request->all());
    }

    /**
     * Destroy the specified resource
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        Pedido::find($id)->delete();
    }
}
