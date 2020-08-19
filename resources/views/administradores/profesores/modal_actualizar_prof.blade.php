  <!-- The Modal -->
  <div class="modal fade" id="edit" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
  
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Actualizar Profesor</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
  
        <!-- Modal body -->
        
            <form method="post" action="{{ route('profesor.update') }}">
                {{method_field('patch')}}
                @csrf                
                <div class="modal-body">             
              <input type="hidden" name="user_id" id="user_id" value="">
                <div class="form-group">
                    <label for="text">Nombre del Profesor:</label>
                    <input type="text" class="form-control" name="name" id="name" required/>
                    @if ($errors->has('nombre'))
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $errors->first('nombre') }}</strong>
                                      </span>
                                  @endif
                </div>
                <div class="form-group">
                  <label for="text">Apellido del Profesor:</label>
                  <input type="text" class="form-control" name="apellido" id="apellido" required/>
                  @if ($errors->has('apellido'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('apellido') }}</strong>
                                    </span>
                                @endif
                </div>
                <div class="form-group">
                  <label for="text">Correo Electrónico:</label>
                  <input type="text" class="form-control" name="email" id="email" required/>
                  @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                </div>
                <div class="form-group">
                  <label for="password">Contraseña:</label>
                  <input type="password" class="form-control" name="password" id="password" placeholder="{{ trans('adminlte::adminlte.password') }}" required/>
                  @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                </div>
                        <!-- Modal footer -->
                   <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>           
                  </div>
              </form>
        </div>
      </div>
    </div>
  </div>