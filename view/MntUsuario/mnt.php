<div class="modal modal-message fade" id="mdlmnt">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="mdltitulo"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form id="mnt_form" method="POST">
                <input type="hidden" id="usu_id" name="usu_id">

                <div class="modal-body">
                    <fieldset>
                        <div class="form-group">
                            <label for="usu_correo">Correo</label>
                            <input type="text" class="form-control" id="usu_correo" name="usu_correo" placeholder="Ingrese un Correo" required>
                        </div>
                      
                        <div class="form-group">
                            <label for="usu_nombre">Nombre</label>
                            <input type="text" class="form-control" id="usu_nombre" name="usu_nombre" placeholder="Ingrese un nombre" required>
                        </div>

                        <div class="form-group">
                            <label for="usu_pass">Password</label>
                            <input type="text" class="form-control" id="usu_pass" name="usu_pass" placeholder="Ingrese password" required>
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
