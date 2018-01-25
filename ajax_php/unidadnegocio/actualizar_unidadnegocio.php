<?php
include('../is_logged.php');
if (empty($_POST['upd_UnegNombre']))
{
        $errors[] = 'UnegNombre vacío';
}
if (empty($_POST['upd_UnegDireccion']))
{
        $errors[] = 'UnegDireccion vacío';
}
else if (!empty($_POST['upd_UnegDireccion']))
{
    require_once('../../config/db.php');
    require_once('../../config/conexion.php');
    $Ruc = mysqli_real_escape_string($con, (strip_tags($_POST['upd_id'], ENT_QUOTES)));
    $Ruc = mysqli_real_escape_string($con, (strip_tags($_POST['upd_Ruc'], ENT_QUOTES)));
    $UnegNombre = mysqli_real_escape_string($con, (strip_tags($_POST['upd_UnegNombre'], ENT_QUOTES)));
    $UnegDireccion = mysqli_real_escape_string($con, (strip_tags($_POST['upd_UnegDireccion'], ENT_QUOTES)));
    $UnegTelefono = mysqli_real_escape_string($con, (strip_tags($_POST['upd_UnegTelefono'], ENT_QUOTES)));
    $UnegCelular = mysqli_real_escape_string($con, (strip_tags($_POST['upd_UnegCelular'], ENT_QUOTES)));
    $sql = "UPDATE unidadnegocio SET Ruc='$Ruc',UnegNombre='$UnegNombre',UnegDireccion='$UnegDireccion',UnegTelefono='$UnegTelefono',UnegCelular='$UnegCelular' WHERE Ruc = '$Ruc'";
    $query_new_insert = mysqli_query($con,$sql);
    if ($query_new_insert){
            $messages[] = 'Empresa ha sido Actualizado satisfactoriamente.';
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
