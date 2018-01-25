<?php
if (isset($con)){?>
    <div class='modal fade' id='addmodelo' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>
      <div class='modal-dialog' role='document'>
        <div class='modal-content'>
          <div class='modal-header'>
                    <button type = 'button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                    <h4 class='modal-title' id='myModalLabel'><i class='fa fa-edit'></i> Agregar Modelo</h4>
          </div>
          <div class='modal-body'>
                    <form class='form-horizontal' method='post' id='guardar_modelo' name='guardar_modelo'>
                        <div id = 'resultados_ajax' ></div>
                            <div class='form-group'>
                            <label for='add_nom_modelo' class='col-sm-3 control-label'>Nombre</label>
                            <div class='col-sm-8'>
                                <input type = 'text' class='form-control' id='add_nom_modelo' name='add_nom_modelo' required>
                            </div>
                            </div>
                            <div class='form-group'>
                            <label for='add_idmarca' class='col-sm-3 control-label'>idmarca</label>
                            <div class='col-sm-8'>
                                <input type = 'text' class='form-control' id='add_idmarca' name='add_idmarca' required>
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
