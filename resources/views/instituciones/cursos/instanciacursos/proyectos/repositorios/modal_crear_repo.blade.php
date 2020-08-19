  <!-- The Modal -->
  <div class="container-fluid">
    <div class="modal fade" id="myModal">
        <div class="modal-dialog">
          <div class="modal-content">
      
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Asignar Repositorio</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
      
            <!-- Modal body -->
            <div class="modal-body">
                <form action="{{ url('/instituciones/cursos/instanciacursos/proyectos/'.$proyecto->id.'/repositorios') }}" method="post">
                  @csrf
              <div class="modal-body">
                @if ($errors->any())
                  <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                  </div><br />
                @endif         
                      <div class="form-group">
                          @csrf
                          <label for="name" class="col-md-7 col-form-label text-md-left">{{ __('Nombre del Repositorio') }}</label>
                          <input type="text" class="form-control" name="linkgit"/>
                      </div>
                      <div class="form-group row">
                          <label for="password" class="col-md-7 col-form-label text-md-left">{{ __('Alumno asociado') }}</label>
                          <select class="form-control m-bot15" name="refproyecto">
                          <option value="{{$proyecto->id}}">{{$proyecto->nombre}}</option>
                        </select>
                          </div>
                      <!-- Modal footer -->
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Crear</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                
              </div>
                    </form>
            </div>
      
            
      
          </div>
        </div>
      </div>
    </div>