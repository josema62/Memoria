@extends('adminlte::page')

@section('title', 'Cursos')

@section('content_header')
    <div class="container-fluid">
      <h1>
        Cursos de {{$curso->nombre}}
      </h1>
      <ol class="breadcrumb">
        <li><a href="/home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Cursos</li>
      </ol>
    </div>
@stop

@section('content')



<div class="container-fluid">
  <!-- Button to Open the Modal -->
<button type="button" class="btn btn-primary" data-refcurso={{$curso->id}} data-toggle="modal" data-target="#create">
    Crear Curso
  </button>
</div>

<br>

<div class="box box-solid box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Cursos</h3>
      <!-- /.box-tools -->
    </div>
    <div class="box-body">
        <div class="row">
            <div class="container-fluid">
              
                  @foreach($instanciacursos as $instancia)
                  <div class="col-md-4">
                <div class="box box-solid box-default">
                  <div class="box-header with-border">
                    <h3 class="box-title pull-center"><b>{{$curso->nombre}}</b></h3>
                  </div><!-- /.box-header -->
                  <div class="box-body">
                      <h6 class="card-subtitle mb-7 text-muted">{{ __('Año: ') }}{{$instancia->ano}}, {{ __('Semestre: ') }}{{$instancia->semestre}}</h6>
                      <h6 class="card-subtitle mb-7 text-muted">{{ __('Profesor Encargado: ') }}{{$instancia->profesor->name}}</h6>
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <button class="btn btn-warning" data-myano="{{$instancia->ano}}" data-mysemestre="{{$instancia->semestre}}" data-instanciaid={{$instancia->id}}  data-toggle="modal" data-target="#edit">Editar</button>                                 
                    <button class="btn btn-danger" data-instanciaid={{$instancia->id}} data-toggle="modal" data-target="#delete">Eliminar</button>
                  </div><!-- box-footer -->
                </div><!-- /.box --> 
              </div>
              @endforeach
            </div>
          </div>
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->

@include('administradores.instituciones.cursos.instanciacursos.modal_crear_instancia')

@include('administradores.instituciones.cursos.instanciacursos.modal_actualizar_instancia')

@include('administradores.instituciones.cursos.instanciacursos.modal_actualizar_instancia')


@stop


@section('js')
    
<script>

$('#create').on('show.bs.modal', function (event) {

  
    var button = $(event.relatedTarget)
    var ano
    var semestre
    var user_id
    var refcurso = button.data('refcurso')


    var modal = $(this)

    modal.find('.modal-body #ano').val(ano);
    modal.find('.modal-body #semestre').val(semestre);
    modal.find('.modal-body #user_id').val(user_id)
    modal.find('.modal-body #refcurso').val(refcurso);
})

$('#edit').on('show.bs.modal', function (event) {

var button = $(event.relatedTarget) 
var nombre = button.data('mynombre') 
var razonsocial = button.data('myrazonsocial')
var refadmin = button.data('myrefadmin')
var institucion_id = button.data('institucionid')

var modal = $(this)

modal.find('.modal-body #nombre').val(nombre);
modal.find('.modal-body #razonsocial').val(razonsocial);
modal.find('.modal-body #refadmin').val(refadmin);
modal.find('.modal-body #institucion_id').val(institucion_id);
})


$('#delete').on('show.bs.modal', function (event) {

var button = $(event.relatedTarget) 

var institucion_id = button.data('institucionid') 
var modal = $(this)

modal.find('.modal-body #institucion_id').val(institucion_id);
})

</script>

@stop