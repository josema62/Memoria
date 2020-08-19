  <!-- The Modal -->
<div class="modal fade" id="create" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
  
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Crear Institución</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
  
        <!-- Modal body -->
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
            <form method="post" action="{{ url('/superadmin/instituciones') }}">
              <div class="form-group">
                  @csrf
                  <label for="text">Nombre de Institución:</label>
                  <input type="text" class="form-control" name="nombre" id="nombre" required/>
                  @if ($errors->has('nombre'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nombre') }}</strong>
                                    </span>
                                @endif
              </div>
              <div class="form-group">
                  <label for="text">Razón Social :</label>
                  <input type="text" class="form-control" name="razonsocial" id="razonsocial" required/>
              </div>
              <div class="form-group">
                  <label for="password" class="col-md-7 col-form-label text-md-left">{{ __('Administrador Encargado') }}</label>
                  <select class="form-control m-bot15" name="refadmin" id="refadmin" required>
                  <option value="">{{__('-----Seleccione un Administrador-----')}}</option>               
                   @foreach($users as $user)
                  <option value="{{$user->id}}">{{$user->name}} {{$user->apellido}}</option>   
                     @endForeach
                 </select>
              </div>
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Crear</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>           
          </div>
        </form>
    </div>
  </div>
</div>