<?php
if (isset($con)){?>
    <div class='modal fade' id='addproveedor' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>
      <div class='modal-dialog' role='document'>
        <div class='modal-content'>
          <div class='modal-header'>
                    <button type = 'button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                    <h4 class='modal-title' id='myModalLabel'><i class='fa fa-edit'></i> Agregar Proveedor</h4>
          </div>
          <div class='modal-body'>
                    <form class='form-horizontal' method='post' id='guardar_proveedor' name='guardar_proveedor'>
                        <div id = 'resultados_ajax' ></div>
                            <div class='form-group'>
                            <label for='add_nom_proveedor' class='col-sm-3 control-label'>Nombre</label>
                            <div class='col-sm-8'>
                                <input type = 'text' class='form-control' id='add_nom_proveedor' name='add_nom_proveedor' required>
                            </div>
                            </div>
                            <div class='form-group'>
                            <label for='add_telf_proveedor' class='col-sm-3 control-label'>Teléfono</label>
                            <div class='col-sm-8'>
                                <input type = 'text' class='form-control' id='add_telf_proveedor' name='add_telf_proveedor' >
                            </div>
                            </div>
                            <div class='form-group'>
                            <label for='add_cel_proveedor' class='col-sm-3 control-label'>Celular</label>
                            <div class='col-sm-8'>
                                <input type = 'text' class='form-control' id='add_cel_proveedor' name='add_cel_proveedor' >
                            </div>
                            </div>
                            <div class='form-group'>
                            <label for='add_ruc_proveedor' class='col-sm-3 control-label'>Ruc</label>
                            <div class='col-sm-8'>
                                <input type = 'text' class='form-control' id='add_ruc_proveedor' name='add_ruc_proveedor' required>
                            </div>
                            </div>
                            <div class='form-group'>
                            <label for='add_dir_proveedor' class='col-sm-3 control-label'>Dirección</label>
                            <div class='col-sm-8'>
                                <input type = 'text' class='form-control' id='add_dir_proveedor' name='add_dir_proveedor' required>
                            </div>
                            </div>
                        </div>
                        <div class='modal-footer'>
                        <button type = 'button' class='btn btn-default' data-dismiss='modal'>Cerrar</button>
                        <button type = 'submit' class='btn btn-primary' id='guardar_datos'>Guardar datos</button>
                       </div>
                    </form>
        </div>
      </div>
    </div>
    <?php } ?>
