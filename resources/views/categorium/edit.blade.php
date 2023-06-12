@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Categorium
@endsection

@section('content')
<link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet"  type='text/css'>
<div class="container-fluid" style="font-family: 'system-ui', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default" style="border:1px solid black;">
                    <div class="card-header"  style="border-style:none; background-color:black; color:#fff;">
                        <span class="card-title">{{ __('Editar') }} categoria</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('categorium.update', $categorium->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('categorium.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
