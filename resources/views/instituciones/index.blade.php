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
<div class="box box-solid box-primary ">
    <div class="box-header with-border">
      <h3 class="box-title">Instituciones</h3>
    </div>
    <div class="box-body ">
        <div class="row">
              
                @foreach($instituciones as $institucion)
                
                <div class="col-md-4 " >
                  <div class="box box-solid box-default ">
                    <div class="box-header with-border">
                      <h3 class="box-title" ><b>{{$institucion->nombre}}</b></h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                      Razon Social: {{$institucion->razonsocial}}
                    </div><!-- /.box-body -->
                    <div class="box-footer">
                        <a href="{{ url('/instituciones/'.$institucion->id.'/cursos')}}" class="btn btn-primary">Ingresar</a>
                                              
                    </div><!-- box-footer -->
                  </div><!-- /.box -->
                  
                
              </div>
              @endforeach
            </div>
            
      </div>
    </div>
  <!-- /.box -->
</div>



  
@include('instituciones.modal_crear_institucion')

@stop

@section('js')

<script>

  $(document).ready(function(){

    $('btn-danger').click( function (event) {

    var button = $(event.relatedTarget) 

    var institucion_id = button.data('institucionid') 

    alert(institucion_id)

    });
  });

    
  

    $('#create').on('show.bs.modal', function () {
  
    
    var nombre
    var razonsocial
    var refadmin
    
    var modal = $(this)
  
    modal.find('.modal-body #nombre').val(nombre);
    modal.find('.modal-body #razonsocial').val(razonsocial);
    modal.find('.modal-body #refadmin').val(refadmin);
    })

</script>

@stop

