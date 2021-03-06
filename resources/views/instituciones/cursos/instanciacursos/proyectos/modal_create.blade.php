<!-- The Modal -->
<div class="modal fade" id="create">
    <div class="modal-dialog">
      <div class="modal-content">
  
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Crear Proyecto</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
  
        <!-- Modal body -->
        <div class="modal-body">
            <form action="{{ route('proyectos.store') }}" method="post">
              @csrf
          <div class="modal-body">
              <input type="hidden" name="instancia_curso_id" id="instancia_curso_id" value="">
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
                      <label for="name" class="col-md-7 col-form-label text-md-left">{{ __('Nombre del Proyecto') }}</label>
                      <input type="text" class="form-control" name="nombre" id="nombre"/>
                  </div>
                  <div class="form-group">
                      <label for="name" class="col-md-7 col-form-label text-md-left">{{ __('Estado del Proyecto') }}</label>
                      <input type="text" class="form-control" name="estado" id="estado"/>
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