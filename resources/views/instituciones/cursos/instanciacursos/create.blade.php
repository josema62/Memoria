@extends('home')

@section('title', 'Crear Instancia')

@section('pagina', 'Crear Instancia')

@section('pagecontent')



<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Nueva Institución
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
      <form method="post" action="{{ url('/instituciones/cursos/'.$curso->id.'/instanciacursos') }}">
        @csrf
          <div class="form-group">
              <label for="number">Año de la Instancia:</label>
              <input type="text" class="form-control" name="ano"/>
              @if ($errors->has('ano'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('ano') }}</strong>
                                </span>
                            @endif
          </div>
          <div class="form-group">
              <label for="password" class="col-md-7 col-form-label text-md-left">{{ __('Semestre') }}</label>
              <select class="form-control m-bot15" name="semestre">               
                <option value="1">1</option>
                <option value="2">2</option>
             </select>
              </div>
          <div class="form-group">
              <label for="password" class="col-md-7 col-form-label text-md-left">{{ __('Nombre del Curso') }}</label>
              <select class="form-control m-bot15" name="refcurso">               
                <option value="{{$curso->id}}">{{$curso->nombre}}</option>
             </select>
              </div>
            <div class="form-group">
                <label for="password" class="col-md-7 col-form-label text-md-left">{{ __('Profesor encargado de Curso') }}</label>
                <select class="form-control m-bot15" name="user_id">               
                  @foreach($users as $user)
                  @if($user->refrol == 3)
                  <option value="{{$user->id}}">{{$user->name}}</option>
                    @endif   
                    @endForeach
                </select>
                </div>
          <button type="submit" class="btn btn-primary">Crear Instancia</button>
      </form>
  </div>
</div>
    




@endsection