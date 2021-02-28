
<div class="modal fade" id="modal-lg-editar">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-teal">
          <h4 class="modal-title">Editar Agenda</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{route('agenda.editar', $age->id)}}" method="POST">
            @csrf 
            <div class="modal-body">
            <div class="container">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label class="text-muted" for="">Nombre</label>
                        <input value="{{old('nombre', $age->nombre)}}" name="nombre" type="text" class="form-control" placeholder="Nombre">
                        </div>
                    </div>
    
                    <div class="col-6">
                        <div class="form-group">
                            <label class="text-muted" for="">Apellidos</label>
                            <input name="apellidos" type="text" class="form-control" placeholder="Apellidos">
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="form-group">
                            <label class="text-muted" for="">Telefono</label>
                            <input name="telefono" type="text" class="form-control">
                        </div>

                    </div>

                    <div class="col-4">
                        <div class="form-group">
                            <label class="text-muted" for="">Celular</label>
                            <input name="celular" type="text" class="form-control">
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="form-group">
                            <label  class="text-muted" for="">Sexo</label>
                            <input name="sexo" type="text" class="form-control" placeholder="Sexo">
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="form-group">
                            <label class="text-muted" for="">Correo</label>
                            <input name="correo" type="email" class="form-control" placeholder="Correo">
                        </div>

                    </div>

                    <div class="col-6">
                        <div class="form-group">
                            <label class="text-muted" for="">Posicion</label>
                            <input name="posicion" type="text" class="form-control" placeholder="Posicion">
                        </div>

                    </div>

                    <div class="col-6">
                        <div class="form-group">
                            <label class="text-muted" for="">Departamento</label>
                            <input name="departamento" type="text" class="form-control" placeholder="Departamento">
                        </div>

                    </div>

                    <div class="col-6">
                        <div class="form-group">
                            <label class="text-muted" for="">Salario</label>
                            <input name="salario" type="text" class="form-control" placeholder="Salario">
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