<?php
include('../is_logged.php');
if (empty($_POST['upd_nom_material']))
{
        $errors[] = 'Nombre vacío';
}
else if (!empty($_POST['upd_nom_material']))
{
    require_once('../../config/db.php');
    require_once('../../config/conexion.php');
    $idmaterial = mysqli_real_escape_string($con, (strip_tags($_POST['upd_id'], ENT_QUOTES)));
    $nom_material = mysqli_real_escape_string($con, (strip_tags($_POST['upd_nom_material'], ENT_QUOTES)));
    $des_material = mysqli_real_escape_string($con, (strip_tags($_POST['upd_des_material'], ENT_QUOTES)));
    $sql = "UPDATE material SET nom_material='$nom_material',des_material='$des_material' WHERE idmaterial = '$idmaterial'";
    $query_new_insert = mysqli_query($con,$sql);
    if ($query_new_insert){
            $messages[] = 'Material ha sido Actualizado satisfactoriamente.';
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
