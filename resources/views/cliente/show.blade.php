@extends('layouts.app')

@section('template_title')
    {{ $cliente->name ?? "{{ __('Show') Cliente" }}
@endsection

@section('content')
<link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet"  type='text/css'>
<div class="container-fluid" style="font-family: 'system-ui', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card" style="border: 1px solid rgb(77, 69, 69); background-color:white;">
                    <div class="card-header"  style="border-style:none; background-color:black; color:#fff;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Detalles del') }} Cliente</span>
                        </div>
                       
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $cliente->nombre }}
                            <br></br>
                        </div>
                        <div class="form-group">
                            <strong>Email:</strong>
                            {{ $cliente->email }}
                            <br></br>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover text-center" style="border-collapse: collapse; margin:25px 0; font-size:0.9em; min-width:400px; box-shadow: 0 0 20px rgba(0,0,0,0.15);">
                                <strong>Pedidos del cliente:</strong>
                                <thead>
                                    <tr style="background-color: #000000; color:#fff;">
										<th>ID</th>
										<th>Fecha</th>
										<th>Precio</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pedido as $pedidos)
                                        <tr>
											<td>{{ $pedidos->id}}</td>
											<td>{{ $pedidos->fecha_pedido }}</td>
											<td>{{ $pedidos->precio }}</td>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('cliente.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
