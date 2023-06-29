<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Pedido;

/**
 * Class ClienteController
 * @package App\Http\Controllers
 */
class ClienteController extends Controller
{

    public function __construct()
    {
        $this->middleware('modificacionProductosCategoriasClientes');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cliente = Cliente::orderBy('id', 'asc')->get();

        return view('cliente.index')->with('cliente', $cliente);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cliente = new Cliente();
        return view('cliente.create', compact('cliente'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        request()->validate(Cliente::$rules);

        $categorium = Cliente::create($request->all());

        return redirect()->route('cliente.index')
            ->with('success', 'Cliente creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $cliente = Cliente::find($id);
        $pedido = Pedido::join('cliente', 'pedido.id_cliente', '=', 'cliente.id')
        ->select('pedido.*')
        ->orderBy('id', 'asc')
        ->where('pedido.id_cliente', '=', $id)
        ->simplePaginate(Controller::$PAGINATION);

         return view('cliente.show')->with('pedido', $pedido)->with('cliente', $cliente);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $cliente = Cliente::find($id);
        return view('cliente.edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $cliente = Cliente::find($id);
        request()->validate(Cliente::$rules);
        $cliente->update($request->all());

        return redirect()->route('cliente.index')
            ->with('success', 'Cliente actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pedido = Pedido::where('id_cliente',$id)->exists();
        $resultado='error';
        $mensaje='Este cliente no puede eliminarse porque existen pedidos asociados a el';

        if(!$pedido){
            Cliente::find($id)->delete();
            $resultado='success';
            $mensaje='Cliente eliminado exitosamente';
            return redirect()->route('cliente.index') ->with($resultado, $mensaje);
        }
        else{
             return redirect()->back()->withErrors($mensaje);
        }
    }
}
