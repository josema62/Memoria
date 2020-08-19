@extends('adminlte::page')

@section('title', 'Repositorios')

@section('content_header')

<div class="container-fluid">
    <h1>
      Repositorios del Proyecto {{$proyecto->nombre}}
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{url('/home')}}"><i class="fa fa-home"></i> Home</a></li>
      <li class="active">Repositorios</li>
    </ol>
  </div>
  
@stop

@section('content')

<div class="container-fluid">
    <!-- Button to Open the Modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
      Crear Repositorio
    </button>
  </div>

<br>

    <div class="container-fluid">
        <div class="box box-solid box-primary">
            <div class="box-header with-border">
              <h3 class="box-title pull-left">Listado de Alumnos</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            </div>
            <table class="table table-bordered table-hover dataTable" id="example" width="100%" role="grid">
      <thead>
        <tr>
          <th>#</th>
          <th>Nombre del proyecto</th>
          <th>Referencia Proyecto</th>
          <td >Acciones</td>
        </tr>
      </thead>

      <tfoot>
          <tr>
              <th>#</th>
              <th>Nombre del proyecto</th>
              <th>Referencia Proyecto</th>
              <td>Acciones</td>
          </tr>
        </tfoot>
      @foreach($repositorios as $repositorio)

      <tbody>
        <tr>
          <td>{{ $repositorio->id }}</td>
          <td>{{ $repositorio->linkgit }}</td>
          <td>{{ $repositorio->refproyecto }}</td>
        <td><a href="#" id="#" class="btn btn-info">Ver Estadísticas</a>
          <a href="#" id="github" class="btn btn-success">Clonar</a></td>
        </tr>
      </tbody>
      @endforeach
    </table>
  </div>
</div>

@include('instituciones.cursos.instanciacursos.proyectos.repositorios.modal_crear_repo')



@stop

@section('js')

<script>

    $(document).ready(function() {
    $('#example').DataTable({
      "processing": true,
    }
    );
} );

</script>

<script>

$('#github').click(function () {

    var data = { nick: '{{auth()->user()->nickgit}}', 
                 pass: '{{auth()->user()->passgit}}',
                 linkgit: '{{$repositorio->linkgit}}',
                 repo_id: '{{$repositorio->id}}'};
                 $.ajax({ type: "POST", headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}, 
                 data: data, url: '/metricas', }).done(function( data ) { console.log(data); });

});

</script>

@stop