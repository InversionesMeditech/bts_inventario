<?php
include('../is_logged.php');
if (empty($_POST['upd_nom_proveedor']))
{
        $errors[] = 'Nombre vacío';
}
if (empty($_POST['upd_ruc_proveedor']))
{
        $errors[] = 'Ruc vacío';
}
if (empty($_POST['upd_dir_proveedor']))
{
        $errors[] = 'Dirección vacío';
}
else if (!empty($_POST['upd_dir_proveedor']))
{
    require_once('../../config/db.php');
    require_once('../../config/conexion.php');
    $idproveedor = mysqli_real_escape_string($con, (strip_tags($_POST['upd_id'], ENT_QUOTES)));
    $nom_proveedor = mysqli_real_escape_string($con, (strip_tags($_POST['upd_nom_proveedor'], ENT_QUOTES)));
    $telf_proveedor = mysqli_real_escape_string($con, (strip_tags($_POST['upd_telf_proveedor'], ENT_QUOTES)));
    $cel_proveedor = mysqli_real_escape_string($con, (strip_tags($_POST['upd_cel_proveedor'], ENT_QUOTES)));
    $ruc_proveedor = mysqli_real_escape_string($con, (strip_tags($_POST['upd_ruc_proveedor'], ENT_QUOTES)));
    $dir_proveedor = mysqli_real_escape_string($con, (strip_tags($_POST['upd_dir_proveedor'], ENT_QUOTES)));
    $sql = "UPDATE proveedor SET nom_proveedor='$nom_proveedor',telf_proveedor='$telf_proveedor',cel_proveedor='$cel_proveedor',ruc_proveedor='$ruc_proveedor',dir_proveedor='$dir_proveedor' WHERE idproveedor = '$idproveedor'";
    $query_new_insert = mysqli_query($con,$sql);
    if ($query_new_insert){
            $messages[] = 'Proveedor ha sido Actualizado satisfactoriamente.';
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
