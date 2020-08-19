@extends('adminlte::page')

@section('title', 'Módulos')

@section('content_header')
    
    <div class="container-fluid">
      <h1>
        Gestión de Módulos
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('/home')}}"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="{{url('/instituciones')}}"><i class="fa fa-page"></i> Instituciones</a></li>
        <li class="active">Módulos</li>
      </ol>
    </div>
    
@stop

@section('content')

<div class="container-fluid">
    <!-- Button to Open the Modal -->
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
      Crear Módulo
    </button>
  </div>



<br>

<div class="box box-solid box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Módulos</h3>
    </div>
    <div class="box-body">
        <div class="row">
            <div class="container-fluid">
              
              @foreach($cursos as $curso) 
              <div class="col-md-4">
                <div class="box box-solid box-default">
                  <div class="box-header with-border">
                    <h3 class="box-title center-block"><b>{{$curso->nombre}}</b></h3>
                  </div><!-- /.box-header -->
                  <div class="box-body">
                      <b>Nombre de la Institución:</b> {{$institucion->nombre}}
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                      <a href="{{ url('/instituciones/cursos/'.$curso->id.'/instanciacursos')}}" class="btn btn-primary">Ver Cursos</a>
                  </div><!-- box-footer -->
                </div><!-- /.box -->
              </div>
            @endforeach
              
            </div>
          </div>
    </div>
  </div>
  <!-- /.box -->



  <!-- The Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
  
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Crear Curso</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
  
        <!-- Modal body -->
        <div class="modal-body">
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
                        <!-- Modal footer -->
                   <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Crear</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>           
                  </div>
              </form>
        </div>
      </div>
    </div>
  </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop