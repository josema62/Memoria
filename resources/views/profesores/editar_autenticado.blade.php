@extends('adminlte::page')

@section('title', 'Editar Perfil')

@section('content_header')

 <h1>Editar Perfil</h1>

@stop

@section('content')


<form method="post" action="{{ route('profesores.actualizar') }}">
  {{method_field('put')}}
  @csrf                
  <div class="modal-body">             
  <input type="hidden" name="id" id="id" value="{{auth()->user()->id}}">
  <input type="hidden" name="refrol" id="refrol" value="{{auth()->user()->refrol}}">
  <div class="form-group">
      <label for="text">Nombre del Profesor:</label>
  <input type="text" class="form-control" name="name" id="name" value="{{auth()->user()->name}}" required/>
      @if ($errors->has('nombre'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('nombre') }}</strong>
                        </span>
                    @endif
  </div>
  <div class="form-group">
    <label for="text">Apellido del Profesor:</label>
  <input type="text" class="form-control" name="apellido" id="apellido" value="{{auth()->user()->apellido}}" required/>
    @if ($errors->has('apellido'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('apellido') }}</strong>
                      </span>
                  @endif
  </div>
  <div class="form-group">
    <label for="text">Correo Electrónico:</label>
  <input type="text" class="form-control" name="email" id="email" value="{{auth()->user()->email}}" required/>
    @if ($errors->has('email'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('email') }}</strong>
                      </span>
                  @endif
  </div>
  <div class="form-group">
    <label for="password">Contraseña:</label>
  <input type="password" class="form-control" name="password" id="password" value="{{auth()->user()->password}}" placeholder="{{ trans('adminlte::adminlte.password') }}" required/>
    @if ($errors->has('password'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('password') }}</strong>
                      </span>
                  @endif
  </div>
  <div class="form-group">
    <label for="text">Nombre Usuario GitHub:</label>
  <input type="text" class="form-control" name="nickgit" id="nickgit" value="{{auth()->user()->nickgit}}" required/>
    @if ($errors->has('nickgit'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('nickgit') }}</strong>
                      </span>
                  @endif
  </div>
  <div class="form-group">
    <label for="password">Contraseña GitHub:</label>
  <input type="password" class="form-control" name="passgit" id="passgit" value="{{auth()->user()->passgit}}" required/>
    @if ($errors->has('password'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('password') }}</strong>
                      </span>
                  @endif
  </div>
          <!-- Modal footer -->
     <div class="modal-footer">
      <button type="submit" class="btn btn-primary">Actualizar</button>
      <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>           
    </div>
</form>

    




@stop