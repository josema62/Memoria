@extends('adminlte::page')

@section('title', 'Proyectos')

@section('content_header')
    
    <div class="container-fluid">
      <h1>
        Gestión de Proyectos
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('/home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </div>
@stop

@section('content')

<div class="container-fluid">
<!-- Button to Open the Modal -->
<button type="button" class="btn btn-primary" data-instanciaid={{$instancia->id}} data-toggle="modal" data-target="#create">
  Crear Proyecto
</button>

</div>

<br>

<div class="container-fluid">
    <div class="box box-solid box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Listado de Proyectos</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
        </div>
        <table class="table table-striped table-bordered" id="example" width="100%" role="grid">
          <thead>
            <tr>
            <th>Nombre</th>
            <th>Estado del Proyecto</th>
            <th>Acciones<th>
            </tr>
          </thead>
          <tfoot>
            <tr>
            <th>Nombre</th>
            <th>Estado del Proyecto</th>
            <th>Acciones</th>
            </tr>
          </tfoot>
          @foreach($proyectos as $proyecto)
          <tbody>
            <tr>
              <td>{{ $proyecto->nombre }}</td>
              <td>{{ $proyecto->estado }}</td>
              <td><a href="{{ url('/instituciones/cursos/instanciacursos/proyectos/'.$proyecto->id.'/repositorios') }}" class="btn btn-primary">Asignar Repositorio</a>
                
              <button class="btn btn-warning" data-mynombre="{{$proyecto->nombre}}" data-proyectoid={{$proyecto->id}}  data-toggle="modal" data-target="#load">Cargar Alumnos</button>
              </td>             
            </tr>            
          </tbody>
          @endforeach
        </table>
      </div>
    </div>

  @include('instituciones.cursos.instanciacursos.proyectos.modal_create')


  @include('instituciones.cursos.instanciacursos.proyectos.modal_alumnos')


@stop


@section('js')



<script>

  $('#create').on('show.bs.modal', function (event) {

    var button = $(event.relatedTarget)
    var nombre
    var estado
    var instancia_curso_id = button.data('instanciaid')

    var modal = $(this)

    modal.find('.modal-body #nombre').val(nombre);
    modal.find('.modal-body #estado').val(estado);
    modal.find('.modal-body #instancia_curso_id').val(instancia_curso_id);
})

  $('#load').on('show.bs.modal', function (event) {

    var button = $(event.relatedTarget) 
    var nombre = button.data('mynombre') 
    var proyecto_id = button.data('proyectoid')
    
    var modal = $(this)

    modal.find('.modal-title #nombre').val(nombre);
    modal.find('.modal-body #proyecto_id').val(proyecto_id);
})

</script>

@stop