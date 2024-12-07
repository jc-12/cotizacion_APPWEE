<div class="modal modal-message fade" id="mdlmnt">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="mdltitulo"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form id="mnt_form" method="POST">
                <input type="hidden" id="con_id" name="con_id">

                <div class="modal-body">
                    <fieldset>


                        <div class="form-group">
                            <label for="cli_id">Cliente</label>
                            <select id="cli_id" name="cli_id" class="default-select2 form-control">

                             </select>
                        </div>


                        <div class="form-group">
                            <label for="car_id">Cargo</label>
                            <select id="car_id" name="car_id" class="default-select2 form-control">

                             </select>
                        </div>

                        <div class="form-group">
                            <label for="con_nom">Nombre</label>
                            <input type="text" class="form-control" id="con_nom" name="con_nom" placeholder="Ingrese un Nombre" required>
                        </div>


                        <div class="form-group">
                            <label for="con_email">Email</label>
                            <input type="text" class="form-control" id="con_email" name="con_email" placeholder="Ingrese un Email" required>
                        </div>

                        <div class="form-group">
                            <label for="con_telf">Teléfono</label>
                            <input type="text" class="form-control" id="con_telf" name="con_telf" placeholder="Ingrese un Telefono" required>
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
