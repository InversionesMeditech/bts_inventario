<?php
include('../is_logged.php');
if (empty($_POST['upd_nombre_categoria']))
{
        $errors[] = 'Nombre vacío';
}
else if (!empty($_POST['upd_nombre_categoria']))
{
    require_once('../../config/db.php');
    require_once('../../config/conexion.php');
    $id_categoria = mysqli_real_escape_string($con, (strip_tags($_POST['upd_id'], ENT_QUOTES)));
    $nombre_categoria = mysqli_real_escape_string($con, (strip_tags($_POST['upd_nombre_categoria'], ENT_QUOTES)));
    $descripcion_categoria = mysqli_real_escape_string($con, (strip_tags($_POST['upd_descripcion_categoria'], ENT_QUOTES)));
    $sql = "UPDATE categorias SET nombre_categoria='$nombre_categoria',descripcion_categoria='$descripcion_categoria' WHERE id_categoria = '$id_categoria'";
    $query_new_insert = mysqli_query($con,$sql);
    if ($query_new_insert){
            $messages[] = 'Categoría ha sido Actualizado satisfactoriamente.';
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
