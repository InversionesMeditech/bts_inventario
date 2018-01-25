<?php
include('../is_logged.php');
if (empty($_POST['upd_nom_modelo']))
{
        $errors[] = 'Nombre vacío';
}
if (empty($_POST['upd_idmarca']))
{
        $errors[] = 'idmarca vacío';
}
else if (!empty($_POST['upd_idmarca']))
{
    require_once('../../config/db.php');
    require_once('../../config/conexion.php');
    $idmodelo = mysqli_real_escape_string($con, (strip_tags($_POST['upd_id'], ENT_QUOTES)));
    $nom_modelo = mysqli_real_escape_string($con, (strip_tags($_POST['upd_nom_modelo'], ENT_QUOTES)));
    $idmarca = mysqli_real_escape_string($con, (strip_tags($_POST['upd_idmarca'], ENT_QUOTES)));
    $sql = "UPDATE modelo SET nom_modelo='$nom_modelo',idmarca='$idmarca' WHERE idmodelo = '$idmodelo'";
    $query_new_insert = mysqli_query($con,$sql);
    if ($query_new_insert){
            $messages[] = 'Modelo ha sido Actualizado satisfactoriamente.';
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
