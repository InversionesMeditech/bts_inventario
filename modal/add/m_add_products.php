<?php
if (isset($con)){?>
    <div class='modal fade' id='addproducts' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>
      <div class='modal-dialog' role='document'>
        <div class='modal-content'>
          <div class='modal-header'>
                    <button type = 'button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                    <h4 class='modal-title' id='myModalLabel'><i class='fa fa-edit'></i> Agregar Productos</h4>
          </div>
          <div class='modal-body'>
                    <form class='form-horizontal' method='post' id='guardar_products' name='guardar_products'>
                        <div id = 'resultados_ajax' ></div>
                            <div class='form-group'>
                            <label for='add_codigo_producto' class='col-sm-3 control-label'>Código</label>
                            <div class='col-sm-8'>
                                <input type = 'text' class='form-control' id='add_codigo_producto' name='add_codigo_producto' required>
                            </div>
                            </div>
                            <div class='form-group'>
                            <label for='add_nombre_producto' class='col-sm-3 control-label'>Nombre</label>
                            <div class='col-sm-8'>
                                <input type = 'text' class='form-control' id='add_nombre_producto' name='add_nombre_producto' required>
                            </div>
                            </div>
                            <div class='form-group'>
                            <label for='add_precio_producto' class='col-sm-3 control-label'>Precio</label>
                            <div class='col-sm-8'>
                                <input type = 'text' class='form-control' id='add_precio_producto' name='add_precio_producto' required>
                            </div>
                            </div>
                            <div class='form-group'>
                            <label for='add_stock' class='col-sm-3 control-label'>stock</label>
                            <div class='col-sm-8'>
                                <input type = 'text' class='form-control' id='add_stock' name='add_stock' required>
                            </div>
                            </div>
                            <div class='form-group'>
                            <label for='add_id_categoria' class='col-sm-3 control-label'>id_categoria</label>
                            <div class='col-sm-8'>
                                <input type = 'text' class='form-control' id='add_id_categoria' name='add_id_categoria' required>
                            </div>
                            </div>
                            <div class='form-group'>
                            <label for='add_idmaterial' class='col-sm-3 control-label'>idmaterial</label>
                            <div class='col-sm-8'>
                                <input type = 'text' class='form-control' id='add_idmaterial' name='add_idmaterial' required>
                            </div>
                            </div>
                            <div class='form-group'>
                            <label for='add_idmodelo' class='col-sm-3 control-label'>idmodelo</label>
                            <div class='col-sm-8'>
                                <input type = 'text' class='form-control' id='add_idmodelo' name='add_idmodelo' required>
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
