<?php
if (isset($con)){?>
    <div class='modal fade' id='updproducts' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>
      <div class='modal-dialog' role='document'>
        <div class='modal-content'>
          <div class='modal-header'>
                    <button type = 'button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                    <h4 class='modal-title' id='myModalLabel'><i class='fa fa-edit'></i> Actualizar Productos</h4>
          </div>
          <div class='modal-body'>
                    <form class='form-horizontal' method='post' id='actualizar_products' name='actualizar_products'>
                        <div id = 'resultados_ajax2' ></div>
                        <input type = 'hidden' name = 'upd_id' id = 'upd_id' >
                            <div class='form-group'>
                            <label for='upd_codigo_producto' class='col-sm-3 control-label'>Código</label>
                            <div class='col-sm-8'>
                                <input type = 'text' class='form-control' id='upd_codigo_producto' name='upd_codigo_producto' required>
                            </div>
                            </div>
                            <div class='form-group'>
                            <label for='upd_nombre_producto' class='col-sm-3 control-label'>Nombre</label>
                            <div class='col-sm-8'>
                                <input type = 'text' class='form-control' id='upd_nombre_producto' name='upd_nombre_producto' required>
                            </div>
                            </div>
                            <div class='form-group'>
                            <label for='upd_precio_producto' class='col-sm-3 control-label'>Precio</label>
                            <div class='col-sm-8'>
                                <input type = 'text' class='form-control' id='upd_precio_producto' name='upd_precio_producto' required>
                            </div>
                            </div>
                            <div class='form-group'>
                            <label for='upd_stock' class='col-sm-3 control-label'>stock</label>
                            <div class='col-sm-8'>
                                <input type = 'text' class='form-control' id='upd_stock' name='upd_stock' required>
                            </div>
                            </div>
                            <div class='form-group'>
                            <label for='upd_id_categoria' class='col-sm-3 control-label'>id_categoria</label>
                            <div class='col-sm-8'>
                                <input type = 'text' class='form-control' id='upd_id_categoria' name='upd_id_categoria' required>
                            </div>
                            </div>
                            <div class='form-group'>
                            <label for='upd_idmaterial' class='col-sm-3 control-label'>idmaterial</label>
                            <div class='col-sm-8'>
                                <input type = 'text' class='form-control' id='upd_idmaterial' name='upd_idmaterial' required>
                            </div>
                            </div>
                            <div class='form-group'>
                            <label for='upd_idmodelo' class='col-sm-3 control-label'>idmodelo</label>
                            <div class='col-sm-8'>
                                <input type = 'text' class='form-control' id='upd_idmodelo' name='upd_idmodelo' required>
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
