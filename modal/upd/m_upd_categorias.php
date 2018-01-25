<?php
if (isset($con)){?>
    <div class='modal fade' id='updcategorias' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>
      <div class='modal-dialog' role='document'>
        <div class='modal-content'>
          <div class='modal-header'>
                    <button type = 'button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                    <h4 class='modal-title' id='myModalLabel'><i class='fa fa-edit'></i> Actualizar Categoría</h4>
          </div>
          <div class='modal-body'>
                    <form class='form-horizontal' method='post' id='actualizar_categorias' name='actualizar_categorias'>
                        <div id = 'resultados_ajax2' ></div>
                        <input type = 'hidden' name = 'upd_id' id = 'upd_id' >
                            <div class='form-group'>
                            <label for='upd_nombre_categoria' class='col-sm-3 control-label'>Nombre</label>
                            <div class='col-sm-8'>
                                <input type = 'text' class='form-control' id='upd_nombre_categoria' name='upd_nombre_categoria' required>
                            </div>
                            </div>
                            <div class='form-group'>
                            <label for='upd_descripcion_categoria' class='col-sm-3 control-label'>Descripción</label>
                            <div class='col-sm-8'>
                                <input type = 'text' class='form-control' id='upd_descripcion_categoria' name='upd_descripcion_categoria' >
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
