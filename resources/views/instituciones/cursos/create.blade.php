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
      <form method="post" action="{{ url('/instituciones/'.$institucion->id.'/cursos') }}">
        @csrf
          <div class="form-group">
              <label for="text">Nombre del curso:</label>
              <input type="text" class="form-control" name="nombre"/>
              @if ($errors->has('nombre'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('nombre') }}</strong>
                                </span>
                            @endif
          </div>
          <div class="form-group">
              <label for="password" class="col-md-7 col-form-label text-md-left">{{ __('Nombre Institución') }}</label>
              <select class="form-control m-bot15" name="refinstitucions">               
                <option value="{{$institucion->id}}">{{$institucion->nombre}}</option>
             </select>
              </div>
          <button type="submit" class="btn btn-primary">Crear Curso</button>
      </form>
  </div>
</div>
    




@stop