<div class="modal modal-message fade" id="mdlmnt">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="mdltitulo"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form id="mnt_form" method="POST">
                <input type="hidden" id="cat_id" name="cat_id">

                <div class="modal-body">
                    <fieldset>
                        <div class="form-group">
                            <label for="cat_nom">Nombre</label>
                            <input type="text" class="form-control" id="cat_nom" name="cat_nom" placeholder="Ingrese Nombre" required>
                        </div>

                        <div class="form-group">
                            <label for="cat_descrip">Descripción</label>
                            <textarea type="text" class="form-control" id="cat_descrip" name="cat_descrip" placeholder="Ingrese Descripción" rows="3" required></textarea>
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
