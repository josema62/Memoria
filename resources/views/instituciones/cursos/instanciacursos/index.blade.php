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
                      <a href="{{ url('/instituciones/cursos/instanciacursos/'.$instancia->id.'/alumnos')}}" class="btn btn-primary">Ver Alumnos</a>
                      <a href="{{ url('/instituciones/cursos/instanciacursos/'.$instancia->id.'/proyectos')}}" class="btn btn-info">Ver Proyectos</a>
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

@include('instituciones.cursos.instanciacursos.modal_crear_instancia')


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

</script>

@stop