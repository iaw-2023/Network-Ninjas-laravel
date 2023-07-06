<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categorium;
use App\Models\DetallesPedido;
use Illuminate\Http\Request;

/**
 * Class ProductoController
 * @package App\Http\Controllers
 */
class ProductoController extends Controller
{

    public function __construct()
    {
        $this->middleware('modificacionProductosCategoriasClientes');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $producto = Producto::orderBy('id','asc')->simplePaginate(Controller::$PAGINATION);

        return view('producto.index', [])->with('producto',$producto);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $producto = new Producto();
        $categorias= Categorium::all();

        return view('producto.create')->with('producto',$producto)->with('categorias',$categorias);
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
        $categorias= Categorium::all();

        return view('producto.edit')->with('producto',$producto)->with('categorias',$categorias);
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
        $mensaje='Este producto no puede eliminarse porque existen pedidos asociados a el';

        if(!$detalles){
            Producto::find($id)->delete();
            $resultado='success';
            $mensaje='Producto eliminado exitosamente';
            return redirect()->route('producto.index') ->with($resultado, $mensaje);
        }
        else{
             return redirect()->back()->withErrors($mensaje);
        }

    }
}
