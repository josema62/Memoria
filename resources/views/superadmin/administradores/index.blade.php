@extends('adminlte::page')

@section('title', 'Administradores')

@section('content_header')
    <div class="container-fluid">
      <h1>
        Gestión de Administradores
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Administradores</li>
      </ol>
    </div>
@stop

@section('content')


<div class="container-fluid">
  <!-- Button to Open the Modal -->
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
    Crear Administrador
  </button>
  
  </div>

<br>

<div class="container-fluid">
    <div class="box box-solid box-primary">
        <div class="box-header with-border">
          <h3 class="box-title pull-left">Listado de Administradores</h3>
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
            @foreach($users as $user)
            <tbody>
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->apellido }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                    <button class="btn btn-warning" data-myname="{{$user->name}}" data-myapellido="{{$user->apellido}}" data-myemail="{{$user->email}}" data-mypass="{{$user->password}}" data-userid={{$user->id}}  data-toggle="modal" data-target="#edit">Editar</button>
                      
                      <button class="btn btn-danger" data-userid={{$user->id}} data-toggle="modal" data-target="#delete">Eliminar</button>
                    </td>
                  </tr>
            </tbody>
            @endforeach
          </table>
    </div>
</div>

@include('superadmin.administradores.modal_crear_admin')

@include('superadmin.administradores.modal_actualizar_admin')

@include('superadmin.administradores.modal_borrar_admin')

@stop

@section('css')
    

@stop

@section('js')

<script>
    $(document).ready(function() {
    $('#example').DataTable({
      "processing": true,
    });
} );

</script>

<script>

  
  $('#edit').on('show.bs.modal', function (event) {

      var button = $(event.relatedTarget) 
      var name = button.data('myname') 
      var apellido = button.data('myapellido')
      var email = button.data('myemail')
      var password = button.data('mypass') 
      var user_id = button.data('userid')
       
      var modal = $(this)

      modal.find('.modal-body #name').val(name);
      modal.find('.modal-body #apellido').val(apellido);
      modal.find('.modal-body #email').val(email);
      modal.find('.modal-body #password').val(password);
      modal.find('.modal-body #user_id').val(user_id);
})


  $('#delete').on('show.bs.modal', function (event) {

      var button = $(event.relatedTarget) 

      var user_id = button.data('userid') 
      var modal = $(this)

      modal.find('.modal-body #user_id').val(user_id);
})


</script>

@stop

