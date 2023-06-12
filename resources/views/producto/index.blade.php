@extends('layouts.app')

@section('template_title')
    Producto
@endsection

@section('content')
<link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet"  type='text/css'>
<div class="container-fluid" style="font-family: 'system-ui', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">
        <div class="row">
            <div class="col-sm-12">
                <div class="card" style="border-style: none;">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center; color:#fff; border-style:none; border:none;">

                            <span id="card_title" style="color:black;">
                                {{ __('Productos') }}
                            </span>
                             <div class="float-right">
                                <a href="{{ route('producto.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left" style="color:#fff; background-color:#000000;">
                                  {{ __('Agregar producto') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    @if($errors->any())
                                <div class="alert alert-danger">
                                 @foreach ($errors->all() as $error)
                                    <p>{{$error}}</p>
                                 @endforeach
                                 </div>
                             @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover text-center" style="border-collapse: collapse; margin:25px 0; font-size:0.9em; min-width:400px; box-shadow: 0 0 20px rgba(0,0,0,0.15);">
                                <thead>
                                    <tr style="background-color: #000000; color:#fff;">
                                        <th>ID</th>
										<th>Nombre</th>
										<th>Precio</th>
										<th>Imagen</th>
										<th>Categoria</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($producto as $product)
                                        <tr>
                                            <td>{{ $product->id }}</td>
											<td>{{ $product->nombre }}</td>
											<td>{{ $product->precio }}</td>
											<td><img style="height:150px; width:250px;" src="{{ $product->img }}" onerror="this.onerror=null;this.src='https://i.ibb.co/QX1M2qF/default-Car.jpg';"></td>
											<td> {{$product->categoria->nombre}}
                                            </td>

                                            <td>
                                                <div class="d-flex justify-content-center" style="display:flex; flex-direction:column; justify-content:center; align-items:center;">
                                                    <form action="{{ route('producto.destroy',$product->id) }}" style="display:flex; flex-direction:column;">
                                                        <a class="btn btn-sm text-white bg-dark" style="border-radius: 5rem; width:6rem;" href="{{ route('producto.show',$product->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Ver') }}</a>
                                                        <a class="btn btn-sm text-white bg-dark" style="border-radius: 5rem; width:6rem; margin-top:.5rem;" href="{{ route('producto.edit',$product->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
                                                    </form>
                                                    <button class="btn btn-sm text-white bg-dark" data-bs-toggle="modal" data-bs-target="#deleteModal" data-bs-id="{{$product->id}}" style="border-radius: 5rem; width:6rem; margin-top:.5rem;"><i class="fa fa-fw fa-trash"></i>Eliminar</button>
                                                    </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-center">
                                {{$producto->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   <!-- Modal -->
   <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Eliminar</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          ¿Esta seguro que quiere eliminar este producto?
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-dismiss="modal">No, cerrar</button>
            <form id="deleteForm" data-bs-action="/producto/" method="POST" action="">
            @csrf
            @method('DELETE')
                <button class="btn btn-outline-primary btn-sm">Si, eliminar</button>
            </form>
        </div>
      </div>
    </div>

</div>
<!-- Script del Modal -->
<script>
    var deleteModal = document.getElementById('deleteModal')
    deleteModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget
        var id = button.getAttribute('data-bs-id')
        var deleteForm = deleteModal.querySelector('#deleteForm')
        var action = deleteForm.getAttribute("data-bs-action")
        deleteForm.setAttribute("action",action+id)
    })
</script>
@endsection
