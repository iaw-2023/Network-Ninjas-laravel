<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\DetallesPedido;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\V1\DetallesPedidoResource;
use App\Http\Requests\V1\StoreDetallesPedidoRequest;

class DetallesPedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDetallesPedidoRequest $request)
    {
        return new DetallesPedidoResource(DetallesPedido::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(DetallesPedido $detallesPedido)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DetallesPedido $detallesPedido)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DetallesPedido $detallesPedido)
    {
        //
    }
}
