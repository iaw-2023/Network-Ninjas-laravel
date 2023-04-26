<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\DetallesPedido;
use Illuminate\Http\Request;

/**
 * Class ProductoController
 * @package App\Http\Controllers
 */
class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $producto = Producto::orderBy('id','asc')->get();
        return view('producto.index')
        ->with('producto',$producto);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $producto = new Producto();
        return view('producto.create', compact('producto'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $producto = Producto::create($request->all());

        return redirect()->route('producto.index')
            ->with('success', 'Producto creado exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $producto = Producto::find($id);

        return view('producto.show', compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $producto = Producto::find($id);

        return view('producto.edit', compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Producto $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {

        $producto->update($request->all());

        return redirect()->route('producto.index')
            ->with('success', 'Producto actualizado exitosamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $detalles = DetallesPedido::where('id_producto',$id)->exists();
        $resultado='error';
        $mensaje='No puede eliminarse';

        if(!$detalles){
            Producto::find($id)->delete();
            $resultado='success';
            $mensaje='Producto eliminado exitosamente';
            return redirect()->route('producto.index')
            ->withErrors($mensaje);
        }

        return redirect()->route('producto.index')
            ->with($resultado, $mensaje);
    }
}
