<!-- Modal -->
<div class="modal modal-danger fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title text-center" id="myModalLabel">Confirmación de Eliminación</h4>
        </div>
        <form action="{{route('institucion.destroy','test')}}" method="post">
                {{method_field('delete')}}
                @csrf
            <div class="modal-body">
                  <p class="text-center">
                      Estas seguro que deseas borrar este institución?
                  </p>
                    <input type="hidden" name="institucion_id" id="institucion_id" value="">
  
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-success" data-dismiss="modal">No, Cancelar</button>
              <button type="submit" class="btn btn-warning">Si, Borrar</button>
            </div>
        </form>
      </div>
    </div>
  </div>