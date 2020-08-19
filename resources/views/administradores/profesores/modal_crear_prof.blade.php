  <!-- The Modal -->
<div class="modal fade" id="create" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
  
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Crear Profesor</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
  
        <!-- Modal body -->
        <div class="modal-body">
            <form method="post" action="{{ url('/administradores/profesores') }}">
              @csrf
                <div class="form-group">
                    <label for="text">Nombre del Profesor:</label>
                    <input type="text" class="form-control" name="name" required/>
                    @if ($errors->has('nombre'))
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $errors->first('nombre') }}</strong>
                                      </span>
                                  @endif
                </div>
                <div class="form-group">
                  <label for="text">Apellido del Profesor:</label>
                  <input type="text" class="form-control" name="apellido" required/>
                  @if ($errors->has('apellido'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('apellido') }}</strong>
                                    </span>
                                @endif
                </div>
                <div class="form-group">
                  <label for="text">Correo Electrónico:</label>
                  <input type="text" class="form-control" name="email" required/>
                  @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                </div>
                <div class="form-group">
                  <label for="password">Contraseña:</label>
                  <input type="password" class="form-control" name="password" placeholder="{{ trans('adminlte::adminlte.password') }}" required/>
                  @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                </div>
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