<div class="modal fade" id="modalCategorias" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Categorias</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="frmCategorias" method="POST" action="">
           {!! csrf_field() !!}
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="Nombre">Nombre</label>
              <input type="text" name="nombre" value="{{old('nombre')}}" class="form-control"
                id="txtNombre">
              {!!$errors->first('nombre', '<span class=error>:message</span>')!!}
            </div>

            <div class="form-group col-md-6">
              <label for="Descripcion">Descripcion</label>
              <input type="text" name="descripcion" value="{{old('descripcion')}}" class="form-control"
                id="txtdescripcion">
              {!!$errors->first('descripcion', '<span class=error>:message</span>')!!}
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary btnGuardar">Guardar</button>
      </div>
    </div>
  </div>
</div>