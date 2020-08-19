  <!-- The Modal -->
  <div class="modal fade" id="edit" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
  
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Actualizar Institución</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
  
        <!-- Modal body -->
        
            <form method="post" action="{{ route('institucion.update', 'test') }}">
                {{method_field('patch')}}
                @csrf                
                <div class="modal-body">             
              <input type="hidden" name="institucion_id" id="institucion_id" value="">
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
                <div class="form-group">
                    <label for="password" class="col-md-7 col-form-label text-md-left">{{ __('Administrador Encargado') }}</label>
                    <select class="form-control m-bot15" name="refadmin" id="refadmin" required>               
                     @foreach($users as $user)
                    <option value="{{$user->id}}">{{$user->name}} {{$user->apellido}}</option>   
                       @endForeach
                   </select>
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