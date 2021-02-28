<div class="modal fade" id="modalEditarColaborador">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-teal">
          <h4 class="modal-title"><i class="fas fa-user"></i> Editar Colaborador</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
    <form action="{{ route('colaboradores.editar', $colaborador->id)}}" method="POST" >
        @csrf
        <div class="modal-body">
          <div class="container">
            <div class="row">
                
                <div class="col-6">
                    <div class="form-group">
                        <label class="text-muted" for="">Nombre</label>
                    <input type="text" name="nombre"  value="{{ old('nombre', $colaborador->nombre)}}" class="form-control">
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label class="text-muted" for="">Especialidad</label>
                    <input type="text" name="especialidad"  value="{{old('especialidad', $colaborador->especialidad)}}" class="form-control">
                    </div>
                </div>
            </div>

          </div>
        </div>
        <div class="modal-footer bg-default justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-info">Guardar</button>
        </div>

    </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->