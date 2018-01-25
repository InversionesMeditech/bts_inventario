<?php
if (isset($con)){?>
    <div class='modal fade' id='addusers' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>
      <div class='modal-dialog' role='document'>
        <div class='modal-content'>
          <div class='modal-header'>
                    <button type = 'button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                    <h4 class='modal-title' id='myModalLabel'><i class='fa fa-edit'></i> Agregar Usuarios</h4>
          </div>
          <div class='modal-body'>
                    <form class='form-horizontal' method='post' id='guardar_users' name='guardar_users'>
                        <div id = 'resultados_ajax' ></div>
                            <div class='form-group'>
                            <label for='add_firstname' class='col-sm-3 control-label'>Nombre</label>
                            <div class='col-sm-8'>
                                <input type = 'text' class='form-control' id='add_firstname' name='add_firstname' required>
                            </div>
                            </div>
                            <div class='form-group'>
                            <label for='add_lastname' class='col-sm-3 control-label'>Apellido</label>
                            <div class='col-sm-8'>
                                <input type = 'text' class='form-control' id='add_lastname' name='add_lastname' >
                            </div>
                            </div>
                            <div class='form-group'>
                            <label for='add_user_password_hash' class='col-sm-3 control-label'>Clave</label>
                            <div class='col-sm-8'>
                                <input type = 'text' class='form-control' id='add_user_password_hash' name='add_user_password_hash' required>
                            </div>
                            </div>
                            <div class='form-group'>
                            <label for='add_user_email' class='col-sm-3 control-label'>Correo</label>
                            <div class='col-sm-8'>
                                <input type = 'text' class='form-control' id='add_user_email' name='add_user_email' required>
                            </div>
                            </div>
                            <div class='form-group'>
                            <label for='add_Admin' class='col-sm-3 control-label'>Admin</label>
                            <div class='col-sm-8'>
                                <input type = 'text' class='form-control' id='add_Admin' name='add_Admin' >
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
