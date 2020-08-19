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
        
        <form method="post" action="{{ route('instanciacursos.update' 'test') }}">
          {{method_field('patch')}}                   
          @csrf
          <div class="modal-body">
          <input type="hidden" name="refcurso" id="refcurso" value="">
            <div class="form-group">
                <label for="number">Año de la Instancia:</label>
                <input type="text" class="form-control" name="ano" id="ano" required/>
                @if ($errors->has('ano'))
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $errors->first('ano') }}</strong>
                                  </span>
                              @endif
            </div>
            <div class="form-group">
                <label for="password" class="col-md-7 col-form-label text-md-left">{{ __('Semestre') }}</label>
                <select class="form-control m-bot15" name="semestre" id="semestre" required>               
                  <option value="1">1</option>
                  <option value="2">2</option>
               </select>
                </div>
              <div class="form-group">
                  <label for="password" class="col-md-7 col-form-label text-md-left">{{ __('Profesor encargado de Curso') }}</label>
                  <select class="form-control m-bot15" name="user_id" id="user_id">               
                    @foreach($users as $user)
                    <option value="{{$user->id}}">{{$user->name}}</option>  
                      @endForeach
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