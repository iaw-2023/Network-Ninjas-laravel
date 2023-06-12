@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Producto
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

                @includeif('partials.errors')

                <div class="card card-default" style="border:1px solid black;">
                    <div class="card-header" style="border-style:none; background-color:black; color:#fff;">
                        <span class="card-title">{{ __('Agregar') }} producto</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('producto.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('producto.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
