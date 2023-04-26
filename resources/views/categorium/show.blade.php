@extends('layouts.app')

@section('template_title')
    {{ $categorium->name ?? "{{ __('Show') Categorium" }}
@endsection

@section('content')
    <style>
        *{
            font-family:Arial, Helvetica, sans-serif;
        }
    </style>
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
                            {{ $categorium->nombre }}
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
