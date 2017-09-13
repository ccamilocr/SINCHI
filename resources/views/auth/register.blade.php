@if(Auth::check() AND Auth::user()->rol=='Administrador')<!--muestra el contenido de la página si esta autenticado-->
@extends('layout')

@section('content')

<div class="row">        
    <div class="col-md-8 col-md-offset-4">
        <div class="card">
            <h4 class="card-header">Registro</h4>
            <div class="card-body">
                <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">Nombre completo</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="col-md-4 control-label">Correo</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('iniciales') ? ' has-error' : '' }}">
                        <label for="iniciales" class="col-md-4 control-label">Iniciales</label>

                        <div class="col-md-6">
                            <input id="iniciales" type="text" class="form-control" name="iniciales" value="{{ old('iniciales') }}" required autofocus>

                            @if ($errors->has('iniciales'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('iniciales') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('rol') ? ' has-error' : '' }}">
                        <label for="rol" class="col-md-4 control-label">Rol</label>
                        
                        <div class="col-md-6">
                            <select id="rol" class="form-control" name="rol">
                                <option value="" selected="selected">Por favor seleccione</option>                                
                                <option value="Administrador">Administrador</option>
                                <option value="Consultor">Consultor</option>
                                <option value="Consultor">Colector</option>                                
                            </select>
                            
                            @if ($errors->has('rol'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('rol') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password" class="col-md-4 control-label">Contraseña</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control" name="password" required>

                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password-confirm" class="col-md-4 control-label">Confirmar contraseña</label>

                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                Registro
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
@endif<!--Cierra el if de mostrar el contenido de la página si esta autenticado-->