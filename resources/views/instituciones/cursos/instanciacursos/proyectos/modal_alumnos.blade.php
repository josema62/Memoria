  <!-- The Modal -->
  <div class="modal fade" id="load" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
    
          <!-- Modal Header -->
          <div class="modal-header">
          <h4 class="modal-title">Cargar Alumnos</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
    
          <!-- Modal body -->
          
              <form method="post" action="{{ route('proyectos.asignaralumnos', 'test') }}">
                  {{method_field('patch')}}
                  @csrf                
                  <div class="modal-body">             
                <input type="hidden" name="proyecto_id" id="proyecto_id" value="">
                  <div class="form-group">
                      <label for="text">Nombre de la Institución:</label>
                      <input type="text" class="form-control" name="nombre" id="nombre" required/>
                      @if ($errors->has('nombre'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('nombre') }}</strong>
                                        </span>
                                    @endif
                  </div>
                  <div class="form-group">
                    <label for="text">Razón Social:</label>
                    <input type="text" class="form-control" name="razonsocial" id="razonsocial" required/>
                    @if ($errors->has('razonsocial'))
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $errors->first('razonsocial') }}</strong>
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