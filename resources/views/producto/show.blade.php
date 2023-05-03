@extends('layouts.app')

@section('template_title')
    {{ $producto->name ?? "{{ __('Show') Producto" }}
@endsection

@section('content')
<link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet"  type='text/css'>
<div class="container-fluid" style="font-family: 'system-ui', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card" style="border-style: none; border: 1px solid black;">
                    <div class="card-header"  style="border-style:none; background-color:black; color:#fff;">
                        <div class="float-left">
                            <span class="card-title">{{ __('') }} Detalles del producto</span>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $producto->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Precio:</strong>
                            {{ $producto->precio }}
                        </div>
                        <div class="form-group">
                            <strong>Imagen:</strong>
                            {{ $producto->img }}
                        </div>
                        <div class="form-group">
                            <strong>Categoria:</strong>
                            {{ $producto->categoria->nombre }}
                        </div>

                    </div>
                    <div class="float-right mb-2 ms-3">
                            <a class="btn bg-dark text-white mb-2" href="{{ route('producto.index') }}"> {{ __('Volver') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

