@extends('adminlte::page')

@section('title', 'Alumnos')

@section('content_header')
    <div class="container-fluid">
      <h1>
        Gestión de Alumnos
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Alumnos</li>
      </ol>
    </div>
@stop

@section('content')



<div class="container-fluid">	
  <div class="box box-solid box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Cargar Alumnos</h3>
      </div>
          <div class="box-body with-border">
              <div class="links">
                  <form method="post" action="{{url('/instituciones/cursos/instanciacursos/'.$instancia->id.'/alumnos')}}" enctype="multipart/form-data">
                      @csrf
                      <input type="file" id="file" name="excel" required>
                      
                      <br><br>
                      <input type="submit" id="enviar" value="Cargar Alumnos" >
                  </form>
              </div>
          </div>
      <!-- /.box-body -->
    </div>
</div>


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
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Correo</th>
                <th>Acciones</th>
              </tr>
            </thead>
            
            <tfoot>
              <tr>
                  <th>Nombre</th>
                  <th>Apellido</th>
                  <th>Correo</th>
                  <th>Acciones</th>
              </tr>
            </tfoot>
            @foreach($alumnos as $alumno)
            <tbody>
                <tr>
                    <td>{{ $alumno->name }}</td>
                    <td>{{ $alumno->apellido }}</td>
                    <td>{{ $alumno->email }}</td>
                <td><button class="btn btn-warning" data-myname="{{$alumno->name}}" data-myapellido="{{$alumno->apellido}}" data-myemail="{{$alumno->email}}" data-mynick="{{$alumno->nickgit}}" data-userid={{$alumno->id}}  data-toggle="modal" data-target="#edit">Editar</button>
                      <button type="button" class="btn btn-danger">Eliminar</button></td>
                  </tr>
            </tbody>
            @endforeach
          </table>
    </div>
</div>

@include('instituciones.cursos.instanciacursos.alumnos.modal_actualizar_alumnos')


@stop

@section('css')
    

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

$('#edit').on('show.bs.modal', function (event) {

  var button = $(event.relatedTarget) 
      var name = button.data('myname') 
      var apellido = button.data('myapellido')
      var email = button.data('myemail')
      var nickgit = button.data('mynick')
      var user_id = button.data('userid')
       
      var modal = $(this)

      modal.find('.modal-body #name').val(name);
      modal.find('.modal-body #apellido').val(apellido);
      modal.find('.modal-body #email').val(email);
      modal.find('.modal-body #nickgit').val(nickgit);
      modal.find('.modal-body #user_id').val(user_id);
})

</script>

@stop

