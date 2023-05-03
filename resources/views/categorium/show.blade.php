@extends('layouts.app')

@section('template_title')
    {{ $categorium->name ?? "{{ __('Show') Categorium" }}
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
                            <span class="card-title">{{ __('Detalles de la') }} categoria</span>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $categoria->nombre }}
                            <br></br>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover text-center" style="border-collapse: collapse; margin:25px 0; font-size:0.9em; min-width:400px; box-shadow: 0 0 20px rgba(0,0,0,0.15);">
                                <strong>Productos de la categoria</strong>
                                <thead>
                                    <tr style="background-color: #000000; color:#fff;">
										<th>Nombre</th>
										<th>Precio</th>
										<th>Imagen</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($producto as $product)
                                        <tr>
											<td>{{ $product->nombre}}</td>
											<td>{{ $product->precio }}</td>
											<td><img style="height:150px; width:250px;" src="{{ $product->img }}"></td>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="float-right">
                            <a class="btn bg-dark text-white mt-2" href="{{ route('categorium.index') }}"> {{ __('Volver') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

