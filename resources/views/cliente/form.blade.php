<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('nombre') }}
            {{ Form::text('nombre', $cliente->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre', 'required', 'pattern'=>'([A-Z]{1})([a-z]+)(\s([A-Z]|[a-z])+)*', 'maxlength=50', 'title'=>'Debe comenzar con una letra mayuscula, seguido de al menos una minuscula, y alguna combinacion de letras y espacios.']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('email') }}
            {{ Form::email('email', $cliente->email, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Email', 'required', 'pattern'=>'[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$', 'maxlength=50', 'title'=>'Debe ser un email valido.']) }}
            {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt-3">
        <button type="submit" class="btn bg-dark text-white">{{ __('Guardar') }}</button>
        <a class="btn bg-dark ms-2 text-white" href="{{ route('cliente.index') }}"> {{ __('Cancelar') }}</a>
    </div>
</div>