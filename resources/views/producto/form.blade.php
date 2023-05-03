<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('nombre') }}
            {{ Form::text('nombre', $producto->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre', 'required', 'maxlength=50']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('precio') }}
            {{ Form::text('precio', $producto->precio, ['class' => 'form-control' . ($errors->has('precio') ? ' is-invalid' : ''), 'placeholder' => 'Precio', 'required', 'step'=>0.01]) }}
            {!! $errors->first('precio', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Imagen') }}
            {{ Form::text('img', $producto->img, ['class' => 'form-control' . ($errors->has('img') ? ' is-invalid' : ''), 'placeholder' => 'Imagen', 'required','maxlength=300']) }}
            {!! $errors->first('img', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Categoria') }}
            <br>
            <select name="id_categoria" required>
                @foreach($categorias as $categoria)
                    <option value="{{$categoria->id}}" @if ($categoria->id == $producto->id_categoria) selected @endif>{{$categoria->nombre}}</option>
                @endforeach
            </select>
        </div>

    </div>
    <div class="box-footer mt-3">
        <button type="submit" class="btn bg-dark text-white">{{ __('Guardar') }}</button>
        <a class="btn bg-dark text-white ms-2" href="{{ route('producto.index') }}"> {{ __('Cancelar') }}</a>
    </div>
</div>

