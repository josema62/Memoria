  <!-- The Modal -->
  <div class="modal fade" id="edit" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
      
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Actualizar Alumno</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
      
            <!-- Modal body -->
            
                <form method="post" action="{{ route('alumnos.update', 'test') }}">
                    {{method_field('patch')}}
                    @csrf                
                    <div class="modal-body">             
                  <input type="hidden" name="user_id" id="user_id" value="">
                    <div class="form-group">
                        <label for="text">Nombre del Alumno:</label>
                        <input type="text" class="form-control" name="name" id="name" required/>
                        @if ($errors->has('nombre'))
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $errors->first('nombre') }}</strong>
                                          </span>
                                      @endif
                    </div>
                    <div class="form-group">
                      <label for="text">Apellido del Alumno:</label>
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
                            <label for="text">Nombre del Nick de GitHub</label>
                            <input type="text" class="form-control" name="nickgit" id="nickgit" required/>
                            @if ($errors->has('nickgit'))
                                              <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $errors->first('nickgit') }}</strong>
                                              </span>
                                          @endif
                        </div>
                            <!-- Modal footer -->
                       <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>           
                      </div>
                  </form>
            </div>
          </div>
        </div>
      </div>