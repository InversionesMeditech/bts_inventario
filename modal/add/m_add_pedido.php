<?php
if (isset($con)){?>
    <div class='modal fade' id='addpedido' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>
      <div class='modal-dialog' role='document'>
        <div class='modal-content'>
          <div class='modal-header'>
                    <button type = 'button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                    <h4 class='modal-title' id='myModalLabel'><i class='fa fa-edit'></i> Agregar Pedido</h4>
          </div>
          <div class='modal-body'>
                    <form class='form-horizontal' method='post' id='guardar_pedido' name='guardar_pedido'>
                        <div id = 'resultados_ajax' ></div>
                            <div class='form-group'>
                            <label for='add_fecha' class='col-sm-3 control-label'>fecha</label>
                            <div class='col-sm-8'>
                                <input type = 'text' class='form-control' id='add_fecha' name='add_fecha' required>
                            </div>
                            </div>
                            <div class='form-group'>
                            <label for='add_idproveedor' class='col-sm-3 control-label'>idproveedor</label>
                            <div class='col-sm-8'>
                                <input type = 'text' class='form-control' id='add_idproveedor' name='add_idproveedor' required>
                            </div>
                            </div>
                            <div class='form-group'>
                            <label for='add_idestado_pedido' class='col-sm-3 control-label'>idestado_pedido</label>
                            <div class='col-sm-8'>
                                <input type = 'text' class='form-control' id='add_idestado_pedido' name='add_idestado_pedido' required>
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
