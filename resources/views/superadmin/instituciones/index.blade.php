@extends('adminlte::page')

@section('title', 'Instituciones')

@section('content_header')
    
    <div class="container-fluid">
      <h1>
        Gestión de Instituciones
      </h1>
      <ol class="breadcrumb">
      <li><a href="{{url('/home')}}"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">Instituciones</li>
      </ol>
    </div>
@stop

@section('content')
    
<div class="container-fluid">
    <!-- Button to Open the Modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#create">
      Crear Institución
    </button>
    
    </div>

<br>


<div class="container-fluid">
  <div class="row">
    <div class="box box-solid box-primary ">
        <div class="box-header with-border">
          <h3 class="box-title">Instituciones</h3>
        </div>
        <div class="box-body">
            <div class="row allign">
                <div class="container-fluid">
                  
                    @foreach($instituciones as $institucion)
                      <div class="col-md-4">
                      <div class="box box-solid box-default">
                        <div class="box-header with-border">
                          <h3 class="box-title" ><b>{{$institucion->nombre}}</b></h3>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                         <h5> <b>Razon Social:</b> {{$institucion->razonsocial}}</h5>
                         <h5> <b>Administrador Encargado:</b> {{$institucion->administrador->name}}</h5>
                        </div><!-- /.box-body -->
                        <div class="box-footer">                            
                          <button class="btn btn-warning" data-mynombre="{{$institucion->nombre}}" data-myrazonsocial="{{$institucion->razonsocial}}" data-myrefadmin="{{$institucion->refadmin}}" data-institucionid={{$institucion->id}}  data-toggle="modal" data-target="#edit">Editar</button>                                 
                          <button class="btn btn-danger" data-institucionid={{$institucion->id}} data-toggle="modal" data-target="#delete">Eliminar</button>                      
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
  </div>
</div> 
  
@include('superadmin.instituciones.modal_crear_institucion')

@include('superadmin.instituciones.modal_borrar_institucion')

@include('superadmin.instituciones.modal_actualizar_institucion')

@stop

@section('js')

<script>

    $('#create').on('show.bs.modal', function () {
  
    
    var nombre
    var razonsocial
    var refadmin
    
    var modal = $(this)
  
    modal.find('.modal-body #nombre').val(nombre);
    modal.find('.modal-body #razonsocial').val(razonsocial);
    modal.find('.modal-body #refadmin').val(refadmin);
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

