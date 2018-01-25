<?php
if (isset($con)){?>
    <div class='modal fade' id='updproveedor' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>
      <div class='modal-dialog' role='document'>
        <div class='modal-content'>
          <div class='modal-header'>
                    <button type = 'button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                    <h4 class='modal-title' id='myModalLabel'><i class='fa fa-edit'></i> Actualizar Proveedor</h4>
          </div>
          <div class='modal-body'>
                    <form class='form-horizontal' method='post' id='actualizar_proveedor' name='actualizar_proveedor'>
                        <div id = 'resultados_ajax2' ></div>
                        <input type = 'hidden' name = 'upd_id' id = 'upd_id' >
                            <div class='form-group'>
                            <label for='upd_nom_proveedor' class='col-sm-3 control-label'>Nombre</label>
                            <div class='col-sm-8'>
                                <input type = 'text' class='form-control' id='upd_nom_proveedor' name='upd_nom_proveedor' required>
                            </div>
                            </div>
                            <div class='form-group'>
                            <label for='upd_telf_proveedor' class='col-sm-3 control-label'>Teléfono</label>
                            <div class='col-sm-8'>
                                <input type = 'text' class='form-control' id='upd_telf_proveedor' name='upd_telf_proveedor' >
                            </div>
                            </div>
                            <div class='form-group'>
                            <label for='upd_cel_proveedor' class='col-sm-3 control-label'>Celular</label>
                            <div class='col-sm-8'>
                                <input type = 'text' class='form-control' id='upd_cel_proveedor' name='upd_cel_proveedor' >
                            </div>
                            </div>
                            <div class='form-group'>
                            <label for='upd_ruc_proveedor' class='col-sm-3 control-label'>Ruc</label>
                            <div class='col-sm-8'>
                                <input type = 'text' class='form-control' id='upd_ruc_proveedor' name='upd_ruc_proveedor' required>
                            </div>
                            </div>
                            <div class='form-group'>
                            <label for='upd_dir_proveedor' class='col-sm-3 control-label'>Dirección</label>
                            <div class='col-sm-8'>
                                <input type = 'text' class='form-control' id='upd_dir_proveedor' name='upd_dir_proveedor' required>
                            </div>
                            </div>
                        </div>
                        <div class='modal-footer'>
                        <button type = 'button' class='btn btn-default' data-dismiss='modal'>Cerrar</button>
                        <button type = 'submit' class='btn btn-primary' id='actualizar_datos'>Guardar datos</button>
                       </div>
                    </form>
        </div>
      </div>
    </div>
    <?php } ?>
