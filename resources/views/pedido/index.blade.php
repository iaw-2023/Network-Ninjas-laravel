@extends('layouts.app')

@section('template_title')
    Pedido
@endsection

@section('content')
<link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet"  type='text/css'>
<div class="container-fluid" style="font-family: 'system-ui', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card" style="border-style: none;">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">
                                {{ __('Pedido') }}
                            </span>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover text-center table-stripped" style="border-collapse: collapse; margin:5px 0; font-size:0.9em; min-width:400px; box-shadow: 0 0 20px rgba(0,0,0,0.15);">
                                <thead class="thead">
                                    <tr style="background-color: #000000; color:#fff;">
                                        <th>ID</th>
										<th>Fecha Pedido</th>
										<th>Precio</th>
										<th>Cliente</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pedido as $pedid)
                                        <tr>
                                            <td>{{ $pedid->id }}</td>
											<td>{{ $pedid->fecha_pedido }}</td>
											<td>{{ $pedid->precio }}</td>
											<td>{{ $pedid->cliente->nombre }}</td>
                                            <td>
                                                <a class="btn btn-sm bg-dark text-white" href="{{ route('pedido.show',$pedid->id) }}" style="border-radius: 5rem; width:9rem;"> {{ __('Detalles del pedido') }}</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-center">
                                {{$pedido->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
