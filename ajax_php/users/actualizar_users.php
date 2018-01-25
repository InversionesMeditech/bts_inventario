<?php
include('../is_logged.php');
if (empty($_POST['upd_firstname']))
{
        $errors[] = 'Nombre vacío';
}
if (empty($_POST['upd_user_password_hash']))
{
        $errors[] = 'Clave vacío';
}
if (empty($_POST['upd_user_email']))
{
        $errors[] = 'Correo vacío';
}
else if (!empty($_POST['upd_user_email']))
{
    require_once('../../config/db.php');
    require_once('../../config/conexion.php');
    $user_id = mysqli_real_escape_string($con, (strip_tags($_POST['upd_id'], ENT_QUOTES)));
    $lastname = mysqli_real_escape_string($con, (strip_tags($_POST['upd_lastname'], ENT_QUOTES)));
    $user_password_hash = mysqli_real_escape_string($con, (strip_tags($_POST['upd_user_password_hash'], ENT_QUOTES)));
    $user_email = mysqli_real_escape_string($con, (strip_tags($_POST['upd_user_email'], ENT_QUOTES)));
    $Admin = mysqli_real_escape_string($con, (strip_tags($_POST['upd_Admin'], ENT_QUOTES)));
    $sql = "UPDATE users SET lastname='$lastname',user_password_hash='$user_password_hash',user_email='$user_email',Admin='$Admin' WHERE user_id = '$user_id'";
    $query_new_insert = mysqli_query($con,$sql);
    if ($query_new_insert){
            $messages[] = 'Usuarios ha sido Actualizado satisfactoriamente.';
    } else{
            $errors[]= 'Lo siento algo ha salido mal intenta nuevamente.'.mysqli_error($con);
    }
} else {
    $errors[]= 'Error desconocido.';
}
if (isset($errors)){
?>
    <div class='alert alert-danger' role='alert'>
    <button type = 'button' class='close' data-dismiss='alert'>&times;</button>
    <strong>Error!</strong> 
<?php
    foreach ($errors as $error) {
    $error;}
?>
    </div>
<?php
}
if (isset($messages)){
?>
    <div class='alert alert-success' role='alert'>
    <button type = 'button' class='close' data-dismiss='alert'>&times;</button>
    <strong>¡Bien hecho!</strong>
<?php
    foreach ($messages as $message) {
    echo $message;}
?>
    </div>
<?php } ?>
