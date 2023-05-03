@extends('layouts.app')

@section('content')
<div class="container-fluid" style="font-family: 'system-ui', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; background-color:white;">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="position:relative; top:25%; border-style:none;">
                <div class="card-body text-center">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <img src="https://i.ibb.co/Snsyq1H/image00001.png" style="width:330px; height:250px; border-radius:100%;" >
                    <br>
                    <p style="margin:1rem; font-size:2rem; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">Bienvenidos a CarFects!</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

