<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('nombre') }}
            {{ Form::text('nombre', $producto->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('precio') }}
            {{ Form::text('precio', $producto->precio, ['class' => 'form-control' . ($errors->has('precio') ? ' is-invalid' : ''), 'placeholder' => 'Precio']) }}
            {!! $errors->first('precio', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('img') }}
            {{ Form::text('img', $producto->img, ['class' => 'form-control' . ($errors->has('img') ? ' is-invalid' : ''), 'placeholder' => 'Img']) }}
            {!! $errors->first('img', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('id_categoria') }}
            {{ Form::text('id_categoria', $producto->id_categoria, ['class' => 'form-control' . ($errors->has('id_categoria') ? ' is-invalid' : ''), 'placeholder' => 'Id Categoria']) }}
            {!! $errors->first('id_categoria', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt-3">
        <button type="submit" class="btn bg-dark text-white">{{ __('Guardar') }}</button>
        <a class="btn bg-dark text-white ms-2" href="{{ route('producto.index') }}"> {{ __('Cancelar') }}</a>
    </div>
</div>
