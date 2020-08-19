@extends('adminlte::page')

@section('title', 'Instituciones')

@section('content_header')
    
    <div class="container-fluid">
      <h1>
        Instituciones Asignadas
      </h1>
      <ol class="breadcrumb">
      <li><a href="{{url('/home')}}"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">Instituciones</li>
      </ol>
    </div>
@stop

@section('content')
    

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
                        <button class="btn btn-danger" data-institucionid={{$institucion->id}} data-toggle="view" data-target="#delete">Eliminar</button>                       
                    </div><!-- box-footer -->
                  </div><!-- /.box -->
                  
                
              </div>
              @endforeach
            </div>
            
      </div>
    </div>
  <!-- /.box -->
</div>




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

