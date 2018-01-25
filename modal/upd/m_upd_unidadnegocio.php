<?php
if (isset($con)){?>
    <div class='modal fade' id='updunidadnegocio' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>
      <div class='modal-dialog' role='document'>
        <div class='modal-content'>
          <div class='modal-header'>
                    <button type = 'button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                    <h4 class='modal-title' id='myModalLabel'><i class='fa fa-edit'></i> Actualizar Empresa</h4>
          </div>
          <div class='modal-body'>
                    <form class='form-horizontal' method='post' id='actualizar_unidadnegocio' name='actualizar_unidadnegocio'>
                        <div id = 'resultados_ajax2' ></div>
                        <input type = 'hidden' name = 'upd_id' id = 'upd_id' >
                            <div class='form-group'>
                            <label for='upd_Ruc' class='col-sm-3 control-label'>Ruc</label>
                            <div class='col-sm-8'>
                                <input type = 'text' class='form-control' id='upd_Ruc' name='upd_Ruc' >
                            </div>
                            </div>
                            <div class='form-group'>
                            <label for='upd_UnegNombre' class='col-sm-3 control-label'>UnegNombre</label>
                            <div class='col-sm-8'>
                                <input type = 'text' class='form-control' id='upd_UnegNombre' name='upd_UnegNombre' required>
                            </div>
                            </div>
                            <div class='form-group'>
                            <label for='upd_UnegDireccion' class='col-sm-3 control-label'>UnegDireccion</label>
                            <div class='col-sm-8'>
                                <input type = 'text' class='form-control' id='upd_UnegDireccion' name='upd_UnegDireccion' required>
                            </div>
                            </div>
                            <div class='form-group'>
                            <label for='upd_UnegTelefono' class='col-sm-3 control-label'>UnegTelefono</label>
                            <div class='col-sm-8'>
                                <input type = 'text' class='form-control' id='upd_UnegTelefono' name='upd_UnegTelefono' >
                            </div>
                            </div>
                            <div class='form-group'>
                            <label for='upd_UnegCelular' class='col-sm-3 control-label'>UnegCelular</label>
                            <div class='col-sm-8'>
                                <input type = 'text' class='form-control' id='upd_UnegCelular' name='upd_UnegCelular' >
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
