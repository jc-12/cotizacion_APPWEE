<div class="modal modal-message fade" id="mdlmnt">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="mdltitulo"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form id="mnt_form" method="POST">
                <input type="hidden" id="prod_id" name="prod_id">

                <div class="modal-body">
                    <fieldset>


                        <div class="form-group">
                            <label for="cat_id">Categoria</label>
                            <select id="cat_id" name="cat_id" class="default-select2 form-control">

                             </select>
                        </div>


                        <div class="form-group">
                            <label for="prod_nom">Nombre</label>
                            <input type="text" class="form-control" id="prod_nom" name="prod_nom" placeholder="Ingrese un Nombre" required>
                        </div>


                        <div class="form-group">
                            <label for="prod_descrip">Descripción</label>
                            <textarea type="text" class="form-control" id="prod_descrip" name="prod_descrip" placeholder="Ingrese Descripción" rows="3" required></textarea>
                        </div>

                        <div class="form-group">
                            <label for="prod_precio">precio</label>
                            <input type="text" class="form-control" id="prod_precio" name="prod_precio" placeholder="Ingrese un precio" required>
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
