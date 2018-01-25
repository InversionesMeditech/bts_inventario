<?php
if (isset($con)){?>
    <div class='modal fade' id='updusers' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>
      <div class='modal-dialog' role='document'>
        <div class='modal-content'>
          <div class='modal-header'>
                    <button type = 'button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                    <h4 class='modal-title' id='myModalLabel'><i class='fa fa-edit'></i> Actualizar Usuarios</h4>
          </div>
          <div class='modal-body'>
                    <form class='form-horizontal' method='post' id='actualizar_users' name='actualizar_users'>
                        <div id = 'resultados_ajax2' ></div>
                        <input type = 'hidden' name = 'upd_id' id = 'upd_id' >
                            <div class='form-group'>
                            <label for='upd_lastname' class='col-sm-3 control-label'>Apellido</label>
                            <div class='col-sm-8'>
                                <input type = 'text' class='form-control' id='upd_lastname' name='upd_lastname' >
                            </div>
                            </div>
                            <div class='form-group'>
                            <label for='upd_user_password_hash' class='col-sm-3 control-label'>Clave</label>
                            <div class='col-sm-8'>
                                <input type = 'text' class='form-control' id='upd_user_password_hash' name='upd_user_password_hash' required>
                            </div>
                            </div>
                            <div class='form-group'>
                            <label for='upd_user_email' class='col-sm-3 control-label'>Correo</label>
                            <div class='col-sm-8'>
                                <input type = 'text' class='form-control' id='upd_user_email' name='upd_user_email' required>
                            </div>
                            </div>
                            <div class='form-group'>
                            <label for='upd_Admin' class='col-sm-3 control-label'>Admin</label>
                            <div class='col-sm-8'>
                                <input type = 'text' class='form-control' id='upd_Admin' name='upd_Admin' >
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
