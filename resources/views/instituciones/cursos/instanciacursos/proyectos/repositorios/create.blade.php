@extends('home')

@section('title', 'Asignar Repositorio')

@section('pagina', 'Asignar Repositorio')

@section('pagecontent')



<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Crear Proyecto
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
      <form method="post" action="{{ route('repositorios.store') }}">
          <div class="form-group">
              @csrf
              <label for="name">Link del Repositorio:</label>
              <input type="text" class="form-control" name="linkgit" required/>
          </div>
          <div class="form-group">
            @csrf
            <label for="name">Referencia Proyecto:</label>
            <input type="text" class="form-control" name="refproyecto" value={{ $proyecto->id }} />
        </div>
        </div>
          <button type="submit" class="btn btn-primary">Asociar Repositorio</button>
      </form>
  </div>
</div>
    




@endsection