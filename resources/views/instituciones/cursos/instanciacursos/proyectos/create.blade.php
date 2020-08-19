@extends('home')

@section('title', 'Crear Proyecto')

@section('pagina', 'Crear Proyecto')

@section('pagecontent')



<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Nuevo Proyecto
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('proyectos.store') }}">
          <div class="form-group">
              @csrf
              <label for="name">Nombre de Proyecto:</label>
              <input type="text" class="form-control" name="nombre"/>
          </div>
          <div class="form-group">
              <label for="price">Estado del Proyecto :</label>
              <input type="text" class="form-control" name="estado"/>
          </div>
          <div class="form-group">
            <h6>Alumnos asociados</h6>
            <select class="form-control" name="refalumno">
                @foreach($alumnos as $alumno)
                <option>{{$alumno->correo}}</option>
                <input type="text" class="form-control" name="refalumno" value={{ $alumno->correo }} />
                @endforeach
            </select>
            
        </div>
          <button type="submit" class="btn btn-primary">Crear Proyecto</button>
      </form>
  </div>
</div>
    




@endsection