@extends('adminlte::page')

@section('title', 'Crear Institucion')

@section('content_header')

 <h1>Crear Institucion</h1>

@stop

@section('content')



<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Nueva Institución
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ url('/instituciones') }}">
          <div class="form-group">
              @csrf
              <label for="text">Nombre de Institución:</label>
              <input type="text" class="form-control" name="nombre"/>
              @if ($errors->has('nombre'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('nombre') }}</strong>
                                </span>
                            @endif
          </div>
          <div class="form-group">
              <label for="text">Razón Social :</label>
              <input type="text" class="form-control" name="razonsocial"/>
          </div>
          <div class="form-group">
              <label for="password" class="col-md-7 col-form-label text-md-left">{{ __('Administrador Encargado') }}</label>
              <select class="form-control m-bot15" name="refadmin">
              <option value="">{{__('-----Seleccione un Administrador-----')}}</option>               
               @foreach($users as $user)
                @if($user->refrol == 2)
              <option value="{{$user->email}}">{{$user->name}} {{$user->apellido}}</option>
                 @endif   
                 @endForeach
             </select>
              </div>
          <button type="submit" class="btn btn-primary">Crear Institución</button>
      </form>
  </div>
</div>
    




@stop