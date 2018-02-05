<?php
if (isset($con)){?>
    <div class='modal fade' id='addcategorias' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>
      <div class='modal-dialog' role='document'>
        <div class='modal-content'>
          <div class='modal-header'>
                    <button type = 'button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                    <h4 class='modal-title' id='myModalLabel'><i class='fa fa-edit'></i> Agregar Categoría</h4>
          </div>
          <div class='modal-body'>
                    <form class='form-horizontal' method='post' id='guardar_categorias' name='guardar_categorias'>
                        <input type ='hidden' id = 'action' name = 'action' value = 'add'>
                        <div id = 'resultados_ajax' ></div>
                            <div class='form-group'>
                            <label for='add_nombre_categoria' class='col-sm-3 control-label'>Nombre</label>
                            <div class='col-sm-8'>
                                <input type = 'text' class='form-control' id='add_nombre_categoria' name='add_nombre_categoria' required>
                            </div>
                            </div>
                            <div class='form-group'>
                            <label for='add_descripcion_categoria' class='col-sm-3 control-label'>Descripción</label>
                            <div class='col-sm-8'>
                                <input type = 'text' class='form-control' id='add_descripcion_categoria' name='add_descripcion_categoria' >
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
