<div class="modal modal-message fade" id="mdlmnt">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="mdltitulo"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form id="mnt_form" method="POST">
                <input type="hidden" id="cli_id" name="cli_id">

                <div class="modal-body">
                    <fieldset>
                        <div class="form-group">
                            <label for="cli_nom">Nombre</label>
                            <input type="text" class="form-control" id="cli_nom" name="cli_nom" placeholder="Ingrese un Nombre" required>
                        </div>

                        <div class="form-group">
                            <label for="cli_ruc">Ruc</label>
                            <input type="text" class="form-control" id="cli_ruc" name="cli_ruc" placeholder="Ingrese un Telefono" required>
                        </div>

                        <div class="form-group">
                            <label for="cli_telf">Teléfono</label>
                            <input type="text" class="form-control" id="cli_telf" name="cli_telf" placeholder="Ingrese un Telefono" required>
                        </div>
                       

                        <div class="form-group">
                            <label for="cli_email">Email</label>
                            <input type="text" class="form-control" id="cli_email" name="cli_email" placeholder="Ingrese un Email" required>
                        </div>

                    </fieldset>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal">Cerrar</button>
                    <button type="submit" name="action" value="add" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
