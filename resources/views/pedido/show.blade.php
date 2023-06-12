@extends('layouts.app')

@section('template_title')
    {{ $pedido->name ?? "{{ __('Show') Pedido" }}
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
                            <span class="card-title">{{ __('Detalles del') }} pedido</span>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Fecha Pedido:</strong>
                            {{ $pedido->fecha_pedido }}
                        </div>
                        <div class="form-group">
                            <strong>Precio:</strong>
                            {{ $pedido->precio }}
                        </div>
                        <div class="form-group">
                            <strong>Nombre del cliente:</strong>
                            {{ $pedido->cliente->nombre }}
                        </div>
                        <div class="form-group">
                            <strong><br> Detalles Pedido: <br> </strong>
                            @foreach ($pedido->detallespedidos as $detalles)
                                                ID de producto: {{$detalles->id_producto}} <br>
                                                Cantidad de producto: {{$detalles->cantidad}} <br>
                                                Nombre de producto: {{$detalles->producto->nombre}} <br>
                                                Precio total: {{$detalles->precio_total}} <br>
                                                @endforeach
                        </div>
                    </div>
                    <div class="float-right">
                            <a class="btn bg-dark text-white mb-3 ms-3" href="{{ route('pedido.index') }}"> {{ __('Volver') }}</a>
                        </div>
            </div>
        </div>
    </section>
@endsection
